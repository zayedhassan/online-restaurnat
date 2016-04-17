<!DOCTYPE html>
<html>

	<meta charset="utf-8">
		<title>Restaurant.com</title>
		   @include('menubar');
</br>
</br>
</br>
</br>
</br>
</br>

  <script type="text/javascript">

    var foodcart = [];
   
    function displayfoodcart(){
        var orderedProductsTblBody=document.getElementById("orderedProductsTblBody");
        
        while(orderedProductsTblBody.rows.length>0) {
            orderedProductsTblBody.deleteRow(0);
        }
       var cart_total_price=0;
       
        for(var product in foodcart){
               
            var row=orderedProductsTblBody.insertRow();
             
            //var cellno=row.insertCell(0) 
            var cellName = row.insertCell(0);
            var celltype = row.insertCell(1);
            var cellPrice = row.insertCell(2);
            
            cellPrice.align="right";
            
            
            cellName.innerHTML = foodcart[product].Name;
            celltype.innerHTML = foodcart[product].type;
            cellPrice.innerHTML = foodcart[product].Price;
            cart_total_price+=foodcart[product].Price;

        }
       
        document.getElementById("cart_total").innerHTML="Total Price:   "+cart_total_price;
    }

    function AddtoCart(name,type,price){
      
       var singleProduct = {};
       
       singleProduct.Name=name;
       singleProduct.type=type;
       singleProduct.Price=price;
       
       foodcart.push(singleProduct);
       
       displayfoodcart();
    }  
    function removefromcart(name,type,price){
        var pro={};
        pro.Name=name;
        pro.type=type;
        pro.price=price;

        foodcart.pop(pro);

        displayfoodcart();
    }

    function passData() {

    var name = "";
    var type = "";
    var price = "";

    for(var product in foodcart){
        name += foodcart[product].Name + ",";
        type += foodcart[product].type + ",";
        price += foodcart[product].Price + ",";    
    }
    document.getElementById("hidName").value = name;
    document.getElementById("hidType").value = type;
    document.getElementById("hidPrice").value = price;
    }
    //Add some products to our shopping cart via code or you can create a button with onclick event
    //AddtoCart("Table","Big red table",50);
    //AddtoCart("Door","Big yellow door",150);
    //AddtoCart("Car","Ferrari S23",150000);


</script>

    
<div class="container-fluid">
<div class="row">
  <div class="container" >
  <div >
<b>
<table style="font-size: 14px"  class="table table-bordered" >
    <tr>
        <td valign="top">

            <table class="table table-condensed" class="table-responsive" class="table table-bordered">
                <thead>
                    <tr><td>#</td>
                        <td >
                            Food for sale
                        </td>
                        <td>Type</td>
                        <td>Price</td>
                    </tr>
                </thead>
                <tbody>
                                     @foreach ($all as $user)   
                    <tr> 
                    <td> {!!$user->f_id!!}</td>
                        <td>
                         
                {!!$user->name!!}

                        </td>
                              <td>
                     {!!$user->type!!}    
                

                        </td>
                        <td>
                          {!!

                        $p=$user->price;
                          $user->price!!}
                        </td>
                        <td>
                        
                      <input type="button" class="btn btn-primary" value="Add to cart" onclick="AddtoCart('{!!$user->name!!}','{!!$user->type!!}',<?php echo $p;?>)"/>
                         
                        </td>
                    </tr>
                    @endforeach
                        
                </tbody>

            </table>
        </td>
        <td width="40%" valign="top" >

        <h3>Ordered Food <input style="float: right;" type="button" class="btn btn-danger" value="Remove" onclick="removefromcart()" /></h3>
            <table  class="table table-bordered" class="table table-condensed" id="orderedProductsTbl">
                <thead>
                    <tr>
                        <td>
                            Name
                        </td>
                        <td>
                            Type
                        </td>
                        <td>
                            Price
                            
                        </td>
                    </tr>
                </thead>
                <tbody id="orderedProductsTblBody">

                </tbody>
                <tfoot>
                    <tr>
                      {!!  Form::open(array('url' => 'buying'));!!}
                       <td colspan="3" align="right" value="Total Price" id="cart_total">

                        </td>

                    </tr>

                </tfoot>
            </table>
             
            
            <input type="hidden" id="hidName" name="hidName" value="">
            <input type="hidden" id="hidType" name="hidType" value="">
            <input type="hidden" id="hidPrice" name="hidPrice" value="">
            <input type="submit" class="btn btn-success" onclick="passData()" style=" float:right" value="Buy" />
             {!!  Form::close(); !!}
        </td>
    </tr>
</table>



  
</div>
</div>
</div>

<div style="padding-top: 30px;">
 <div class="panel-footer">
      
      
        <p style="text-align: center; color:black;" class="muted credit">Zayed@2016</p>
     
    </div>
    </div>