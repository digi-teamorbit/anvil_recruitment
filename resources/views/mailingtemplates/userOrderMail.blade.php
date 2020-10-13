
<style type="text/css">
	h1, h2, h3, h4, h5, p { font-family: calibri; color: #2a3342; }
</style>
<?php 	
use App\orders_products;
$_getOrdersData = orders_products::where('orders_products.orders_id',$data['amount'])
				->orderBy('orders_products.order_products_id', 'desc')
				->get(); ?>
<div style=""> <!-- main Div -->

	<div style="margin: 50px auto; color: #2a3342; border:7px solid #eee; ">

		<div style=" padding: 20px 0 20px 0;">
					 
  
  
			<img src="{{asset($logo->img_path)}}" width="200px;" style="display: block; margin-left: auto; margin-right: auto;">

			<div style="width: 20%; height: 1px; background-color: #68b7a4; margin: 10px auto 10px auto;"></div>

		</div>

		<br><br>

		<div style="padding: 0 40px 20px 40px;"> 
		<h2>Thank You For Order</h2>
			<!--<p style="color: #545454; margin: 0;">Hi {{$username}} <br><br> Thank you for placing a request for
			 @foreach($cart as $key=>$value)
			{{ $value['name'].' / ' }}
			@endforeach
			with Hyberr
			</p>-->
			<br><br>
			<!--<p style="color: #545454; margin: 0;"> Your booking has accepted and a professional will be assigned to you shortly, prior to your scheduled time.</p>
			<br><br>-->
			<table style="width:100%;  border: 1px solid black;
  border-collapse: collapse;">
  <tr>
    <th style=" border: 1px solid black;
  border-collapse: collapse;  padding: 15px;
  text-align: left;">Product  </th>
  <th style=" border: 1px solid black;
  border-collapse: collapse;  padding: 15px;
  text-align: left;">Price</th>
   <th style=" border: 1px solid black;
  <border-collapse: collapse;  padding: 15px;
  <text-align: left;">Quantity</th>
  <th style=" border: 1px solid black;
  border-collapse: collapse;  padding: 15px;
  text-align: left;">Amount</th>
  </tr>
  
   @foreach($cart as $key=>$value)
 <tr>
    <td style=" border: 1px solid black;
  border-collapse: collapse;   padding: 15px;
  text-align: left;">{{ $value['name'] }}</td>  
    <td style=" border: 1px solid black;
  border-collapse: collapse;">{{$value['baseprice']}}</td>
   <td style=" border: 1px solid black;
  <border-collapse: collapse;">{{ $value['qty'] }}</td>
  <td style=" border: 1px solid black;
  border-collapse: collapse;">{{$value['baseprice'] * $value['qty']}}</td>
  </tr>
    @endforeach
  
</table>

<br/>

<!--<p style="color: #545454; margin: 0;">Need assistance? Drop us a note at <a href="mailto:support@hyberr.com">support@hyberr.com</a>, As always, thank you for choosing Hyberr</p>
<br/>
<p style="color: #545454; margin: 0;">Team Hyberr</p>
<br/>
        <a href="{{ App\Http\Traits\HelperTrait::returnFlag(682) }}" target="_blank"><img style="width: 10%; float: left;" src="{{ asset('images/FB-icon.png') }}"/></a>
        <a href="{{ App\Http\Traits\HelperTrait::returnFlag(1962) }}" target="_blank"><img style="width: 10%" src="{{ asset('images/insta-icon.png') }}"/></a>-->
        
        
		</div>

		<br><br>


	</div>

</div>