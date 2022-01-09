<div>
    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
{{--                    <h5 class="font-weight-semi-bold  mb-4">Filter by Category <span class="badge border font-weight-normal">{{ $products->total() }}</span></h5>--}}
                    <div
                        class="font-weight-semi-bold d-flex justify-content-between mb-3">
                        <h5>Filter by Category</h5>
{{--                        <span class="badge font-weight-normal">{{ $products->total() }}</span>--}}
                        <span class="badge font-weight-normal">{{ $products->count() }}</span>
                    </div>
                    @foreach($allCategories as $category)
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input
                                wire:model="selectedCategories"
                                {{ in_array($category->id,(array)$selectedCategories)?'checked':'' }}
                                type="checkbox" class="custom-control-input" id="category-{{ $category->id }}"
                                value="{{ $category->id }}">
                            <label class="custom-control-label"
                                   for="category-{{ $category->id }}">{{ $category->name }}</label>
                            <span class="badge border font-weight-normal">{{ $category->products_count }}</span>
                        </div>
                    @endforeach

                </div>
                <!-- Price End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="input-group">
                                <input wire:model="search" type="text" class="form-control"
                                       placeholder="Search by name">
                                <div class="input-group-append">
                                                            <span class="input-group-text bg-transparent text-primary">
                                                                <i class="fa fa-search"></i>
                                                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    @foreach($products->items() as $product)--}}
                    @foreach($products as $product)
                        @include('product_item')
                    @endforeach
{{--                    <div class="col-12 pb-1">--}}
{{--                        <nav aria-label="Page navigation">--}}
{{--                            {!!  $products->render('pagination::bootstrap-4')  !!}--}}

{{--                        </nav>--}}
{{--                    </div>--}}
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
</div>
