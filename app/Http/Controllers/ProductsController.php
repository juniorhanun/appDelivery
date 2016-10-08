<?php

namespace Delivery\Http\Controllers;

use Delivery\Repositories\CategoryRepository;
use Illuminate\Http\Request;

use Delivery\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Delivery\Http\Requests\ProductCreateRequest;
use Delivery\Http\Requests\ProductUpdateRequest;
use Delivery\Repositories\ProductRepository;
use Delivery\Validators\ProductValidator;


class ProductsController extends Controller
{

    /**
     * @var ProductRepository
     */
    protected $repository;

    /**
     * @var ProductValidator
     */
    protected $validator;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(ProductRepository $repository,
                                ProductValidator $validator,
                                CategoryRepository $categoryRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->categoryRepository = $categoryRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $num = 1;
        $products = $this->repository->scopeQuery(function($query) use($num){
            return $query->where('status', '=', $num);
        })->paginate();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $products,
            ]);
        }

        return view('admin.produtos.index', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $data = $request->all();
            $image = $request->file('img');

            $imageName = time().$image->getClientOriginalName();

            $image->move(public_path('media/'.$data['name']."/"),$imageName);

            $data['img'] = $imageName;

            $product = $this->repository->create($data);

            $response = [
                'message' => 'Product created.',
                'data'    => $product->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            //return redirect()->back()->with('message', $response['message']);
            return redirect()->route("admin.categorias.index");
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function nova()
    {
        $category = $this->categoryRepository->all()->pluck('name','id');
        return view('admin.produtos.create', compact('category'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $product,
            ]);
        }

        return view('admin.produtos.show', compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = $this->repository->find($id);
        $category = $this->categoryRepository->all()->pluck('name','id');

        return view('admin.produtos.edit', compact('product','category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProductUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $product = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Product updated.',
                'data'    => $product->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            //return redirect()->back()->with('message', $response['message']);
            return redirect()->route("admin.produtos.index");
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Product deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Product deleted.');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function excluir($id)
    {
        $entidade = $this->repository->find($id);

        $entidade->status = 0;


        $this->repository->update($entidade->toArray(),$id);
        return redirect()->route("admin.produtos.index");
    }
}
