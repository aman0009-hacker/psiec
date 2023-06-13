let num=0;
function add()
{
    let prod_qunt=document.getElementsByClassName('form-group');
    let c=document.getElementsByClassName('input-group');
   
    c[1].style.marginBottom="10px";
    c[6].style.marginBottom="10px";
    
    num++;
let b=document.createElement('div');
b.setAttribute('class','pro');
b.innerHTML=`<label for="product" class="col-sm-2  control-label">Product</label>
<div class="col-sm-8">

        
        <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
            <input type="text" id="product" name="product" value="" class="form-control product" placeholder="Input Product">

            
            
        </div>

        
    </div>`

    let d=document.createElement('div');
    d.setAttribute('class','qua');
    d.innerHTML=`<label for="quantity${num}" class="col-sm-2  control-label">Quantity</label>
    
    <div class="col-sm-8">

        
        <div class="input-group">

            
            <div class="input-group">
            <span class="input-group-btn">
            <button type="button" class="btn btn-primary">-</button>
            </span>
            <input style="width: 100px; text-align: center;" type="text" id="quantity${num}" name="quantity" value="" class="form-control quantity initialized" placeholder="Input Quantity">
            <span class="input-group-btn">
            <button type="button" class="btn btn-success">+</button>
            </span>
            </div>

            
            
        </div>

        
    </div>`
    
    prod_qunt[0].append(b);
    prod_qunt[3].append(d);

}
function sub()
{
    let product=document.getElementsByClassName('pro');
    let quantity=document.getElementsByClassName('qua');
  if(product.length>0 && quantity.length>0)
  {
     product[0].remove();
     quantity[0].remove();
  }
   
 
  

   
}