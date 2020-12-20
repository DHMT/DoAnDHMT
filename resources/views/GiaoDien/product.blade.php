@extends('root')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$sp->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Home</a> / <span>Thông tin</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="source/images/product/{{$sp->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$sp->name}}</p>
											@if($sp->promotion_price!=0)
											<p class="single-item-price">
												<span class="flash-del">{{$sp->unit_price}}</span>
												<span class="flash-sale">{{$sp->promotion_price}}</span>
											</p>
											@else
											<p class="single-item-price">
												<span style="color: black" class="flash-sale">{{$sp->unit_price}}</span>
											</p>
											@endif
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$sp->discription}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Options:</p>
							<div class="single-item-options">
							
								<select class="wc-select" name="color">
									<option>Color</option>
									<option value="Red">Red</option>
									<option value="Green">Green</option>
									<option value="Yellow">Yellow</option>
									<option value="Black">Black</option>
									<option value="White">White</option>
								</select>
								<select class="wc-select" name="color">
									<option>Qty</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
				

				
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Tương tự</h4>

						<div class="row">
	@foreach($sptt as $tt)
								<div class="col-sm-4">
									<div class="single-item">
										@if($tt->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif

										<div class="single-item-header">
											<a href="{{route('product',$tt->id)}}"><img style="height: 200px" src="source/images/product/{{$tt->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$tt->name}}</p>
											@if($tt->promotion_price!=0)
											<p class="single-item-price">
												<span class="flash-del">{{$tt->unit_price}}</span>
												<span class="flash-sale">{{$tt->promotion_price}}</span>
											</p>
											@else
											<p class="single-item-price">
												<span style="color: black" class="flash-sale">{{$tt->unit_price}}</span>
											</p>
											@endif
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sphot as $sph)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('product',$sph->id)}}"><img src="source/images/product/{{$sph->image}}" alt=""></a>
									<div class="media-body">
										{{$sph->name}}
												@if($sph->promotion_price!=0)
											<p class="single-item-price">
												<span class="flash-del">{{$sph->unit_price}}</span>
												<span class="flash-sale">{{$sph->promotion_price}}</span>
											</p>
											@else
											<p class="single-item-price">
												<span style="color: black" class="flash-sale">{{$sph->unit_price}}</span>
											</p>
											@endif
									</div>
								</div>
								
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->

				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection