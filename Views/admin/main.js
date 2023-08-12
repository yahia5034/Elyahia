document.addEventListener("DOMContentLoaded", function() {

    fetchProducts().then(data=>{
      displayTypes(data),
      displayProducts(data)
    });
});
// Fetch all products from PHP using AJAX
function fetchProducts(){
  return fetch("searchBack.php").
    then(response=>response.json()).
    then(data=>data);
}

function displayProducts(data){
  let html ="";
  html +=`
  <table class="table my-0" id="dataTable">
    <thead>
        <tr>
            <th class="text-end">المنشأ</th>
            <th class="text-end">النوع</th>
            <th class="text-end">وصف</th>
            <th class="text-end">بيع</th>
            <th class="text-end">السعر</th>
            <th class="text-end">الكمية&nbsp;</th>
            <th class="text-end">الاسم&nbsp;</th>
            <th class="text-end">الرقم&nbsp;</th>
        </tr>
    </thead>
    <tbody>                              
    `;
  for(let i= 0;i < data.length;i++){
  html+=` 
        <tr class="h">
            <td>  ${data[i]['madein']}   </td>
            <td>`+  data[i]['type_name']   +`</td>
            <td>`+  data[i]['property']    +`</td>
            <td>`+  data[i]['sellprice']   +`</td>
            <td>`+  data[i]['price']       +`</td>
            <td>`+  data[i]['quantity']    +`</td>
            <td><a class="btn productsName" style="color: #000000!important" href="EditProduct.php?sku=`+data[i].sku +`  "> `+  data[i]['pname'] +`</a></td>
            <td><a class="btn" style="color: #000000!important" href="EditProduct.php?sku=`+data[i].sku+`"> `+  data[i]['sku']   +`</a></td>
        </tr>   
           `;
  }
  let d = document.getElementById("products");
  html+= ` 
  </tbody>
  <tfoot>
      <tr></tr>
  </tfoot>
  </table >`;
  d.innerHTML=html;
}

function displayTypes(data){
  let selectHtml="";
  let uniqueValues = new Set();
  let s = document.getElementById("selectValue");
  selectHtml +=  `<select name="selectValue" id="selectValue">
  <option value="ALL"> `+"ALL" +`</option>
  `;

  for(let i= 0;i < data.length;i++){
      const typeName = data[i].type_name;
      if (!uniqueValues.has(typeName)) {
      uniqueValues.add(typeName);
      selectHtml += `
          <option value="${typeName}">${typeName}</option>
      `;
      }
  }
  selectHtml +=`</select>`;
  s.innerHTML=selectHtml;
}

document.getElementById("selectValue").addEventListener("change", function() {
  const selectValue = this.value;
  fetchProducts()
    .then(products => filterProducts(products, selectValue))
    .then(filteredProducts => displayProducts(filteredProducts));
});

// // Function to filter the products based on the selected value
function filterProducts(products, selectValue) {
  return (selectValue!="ALL")?products.filter(product => product.type_name == selectValue):products;
}

searchProducts=(e)=>{
  console.log("clicked");
  e.preventDefault();
  let input = document.getElementById("search");
  // fetchProducts()
  // .then(data=>
  //   displayProducts(
  //     data.filter(x=>x.pname.includes(input.value))
  //     ));
  let rows=document.getElementsByClassName("h");
  let products= document.getElementsByClassName("productsName");
  console.log(products[0].innerHTML);
  // console.log(rows);
  for (let i = 0;i<products.length;i++){
    if(!products[i].innerHTML.includes(input.value)){
      rows[i].style.display="none";
    }else{
      rows[i].style.display="table-row";
    }
  }
}


/* It is an open stream to the data base 
  or
  it is like a search.
*/
searchFast=()=>{
  let input = document.getElementById("search");
  /* open stream */
  // fetchProducts()
  // .then(data=>
  //   displayProducts(
  //     data.filter(x=>x.pname.includes(input.value))
  //     ));
  
  /*NOrmal way */
  let rows=document.getElementsByClassName("h");
  let products= document.getElementsByClassName("productsName");
  console.log(products[0].innerHTML);
  // console.log(rows);
  for (let i = 0;i<products.length;i++){
    if(!products[i].innerHTML.includes(input.value)){
      rows[i].style.display="none";
    }else{
      rows[i].style.display="table-row";
    }
  }
}