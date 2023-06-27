<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <title>Document</title>
    <style>
        svg
        {
            width:25px;
            cursor: pointer;
        }
        .add_pro_qua {
    display: flex;
    flex-wrap:wrap;
}
.newly_row
{
    flex:0 0 40%;
}
    </style>
</head>

<body>
    <form method="post" action="{{route('storeData')}}">
        @csrf
        <div class="pro-qua">

            <label for="date">Date</label>
            <input type="dateTime-local" id="date_picker" name="date[]">
            {{-- <input type="datetime-local" id="myDateTime" min="" max=""> --}}
        
            <label for="product">Product</label>
            {{-- <input type="text" id="product"name="product[]"> --}}
            <select name="product[]" id="product">
                @foreach ($data as $values )
                
                <option value={{$values->title}}>{{$values->title}}</option>
                @endforeach
            </select>
            <label for="quantity">Quantity</label>
           <input type="number" id="quantity"name="quantity[]">

           <label for="amount">Amount</label>
           <input type="number" id="amount"name="amount[]">
           <span ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" onclick="added()"><path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z" ></path></svg></span>
           <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" onclick="deleted()"><path d="M5 11V13H19V11H5Z"></path></svg></span>
        </div>
        <div class="add_pro_qua">
            <div class="dateclass">

            </div>
            <div class="productclass">

            </div>
            <div class="quantityclass">

            </div>
            <div class="amountclass">

            </div>
                
        </div>
     <div class="notes"style="display:flex;margin-top:20px">
         <label for="note">Notes</label>
         <textarea cols="50" rows="10"name="note" id="note"></textarea>

     </div>
     <input type="submit"value="Submit" class="btn btn-primary"style="margin-top:10px">
    </form>
<script>
    let nums=0;
    function added()
    {
        nums++;

    let a= document.getElementsByClassName('productclass');
    let b= document.getElementsByClassName('quantityclass');
    let c= document.getElementsByClassName('amountclass');
    let d=document.getElementsByClassName('dateclass');

     let datter=document.createElement('div');
     datter.setAttribute('class','date_row');
     datter.innerHTML=`  <label for="date">Date</label>
            <input type="datetime-local"name="date[]">`

    let makeElement=document.createElement('div');
    let attr=makeElement.setAttribute('class',"newly_row");
    makeElement.innerHTML=` <label for="product${nums}">Product</label>
    <select name="product[]" id="product">
                @foreach ($data as $values )
                
                <option value={{$values->title}}>{{$values->title}}</option>
                @endforeach
            </select>`;
   
   
   
      let makeQunatity=document.createElement('div');
  makeQunatity.setAttribute('class',"news_row");
    makeQunatity.innerHTML=`   <label for="quantity${nums}">Quantity</label>
           <input type="number" id="quantity${nums}"name="quantity[]">`;
      
      
      
           let makeamount=document.createElement('div');
           makeamount.setAttribute('class',"newos_row");
           makeamount.innerHTML=`   <label for="amount${nums}">Amount</label>
           <input type="number" id="amount${nums}"name="amount[]">`;

      
                    
  
    // let makeElement1=document.createElement('label');
    // let attr1=makeElement.setAttribute('for','two');
    // makeElement1.innerHTML=`  <label for="two${nums}">Product</label>
    //         <input type="number" id="two${nums}">`;
        a[0].append(makeElement);
        b[0].append(makeQunatity);
        c[0].append(makeamount);
        d[0].append(datter);
    }

function deleted()
{
    let re1= document.getElementsByClassName('newly_row');
    let re2= document.getElementsByClassName('news_row');
    let re3= document.getElementsByClassName('newos_row');
    let re4=document.getElementsByClassName('date_row');
 
    
    if(nums>0)
    {
   nums--;
   
    }

if(re1.length>0)
{
re1[nums].remove();
re2[nums].remove();
re3[nums].remove();
re4[nums].remove();

}
else
{
alert('Not any coloumn to remove');
}

}

var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth()+1).padStart(2, '0');
        var yyyy = today.getFullYear();
        var hours=today.getHours() ;
        var minutes=today.getMinutes();
        var second=today.getSeconds();
        today = yyyy + '-' + mm + '-' + dd +" "+hours+":"+minutes+":"+second;
        $('#date_picker').attr({max:today,min:today});
        $('#date_picker').val(today);


// var currentDate = new Date();
//   var year = currentDate.getFullYear();
//   var month = String(currentDate.getMonth() + 1).padStart(2, '0');
//   var day = String(currentDate.getDate()).padStart(2, '0');
//   var hours = String(currentDate.getHours() % 12 || 12).padStart(2, '0');
//   var minutes = String(currentDate.getMinutes()).padStart(2, '0');
//   var formattedDate = `${year}-${month}-${day}T${hours}:${minutes}`;
//   $('#myDateTime').attr({min:formattedDate,max:formattedDate});

</script>


</body>

</html>