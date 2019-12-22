<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ProductDataTable;
use App\Exceptions\ProductNotFoundException;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Admin\Product;
use App\Repositories\Admin\ProductRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Response;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param ProductDataTable $productDataTable
     * @return Response
     */
    public function index(ProductDataTable $productDataTable)
    {
        return $productDataTable->render('admin.products.index');
    }

    public function showSearch()
    {
        return view('admin.products.search');
    }

    public function submitSearch(\Illuminate\Http\Request $request)
    {
//        $product = Product::find($request->input('product_id'));
//        if (!$product) {
//            return abort('404');
//        }
        try {
//            $product = Product::findOrFail($request->input('product_id'));
            $product = $this->productRepository->search($request->input('product_id'));
        } catch (ModelNotFoundException $exception) {
//            return $exception->getMessage();
            return redirect()->back()->withError($exception->getMessage())->withInput();
//            return redirect()->back()->withError('Không có kết quả tìm kiếm cho product với Id: '. $request->input('product_id'))->withInput();
        }
//        $product = Product::findOrFail($request->input('product_id'));
        return view('admin.products.show_search', compact('product'));
    }

    private function demo($var) {

        echo " Trước khi vào try <br>";
        try {
            echo "Vào try block <br>";

            // If var is zerothen only if will be executed
            if($var == 0) {

                // If var is zero then only exception is thrown
                throw new \Exception('Number is zero. <br>');

                // This line will never be executed
                echo "Đoạn này sẽ không bao giờ được hiện ra <br>";
            }
            echo "Không gặp throw sẽ nhìn thấy dòng này <br>";
        }

            // Catch block will be executed only
            // When Exception has been thrown by try block
        catch(\Exception $e) {
            echo "Exception :" . $e->getMessage() . "<br>";
        }
        finally {
            echo "Đoạn này lúc nào cũng chạy <br>";
        }

        // This line will be executed whether
        // Exception has been thrown or not
        echo "Sau khi try-catch <br>";
    }

    public function demoException()
    {
        $this->demo(5);
        echo "-------------------------- <br>";
        $this->demo(0);

    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        $product = $this->productRepository->create($input);

        Flash::success('Product saved successfully.');

        return redirect(route('admin.products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }

        return view('admin.products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }

        return view('admin.products.edit')->with('product', $product);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int              $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }

        $product = $this->productRepository->update($request->all(), $id);

        Flash::success('Product updated successfully.');

        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('admin.products.index'));
    }
}
