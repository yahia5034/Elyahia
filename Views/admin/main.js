class ProductData{
  constructor(){
    this.products=fetch("searchBack.php").
    then(response=>response.json()).
    then(data=>data);
    this.products.then(data=>console.log(data))
  }
  getProducts(){
      return this.products;
  }
  setProducts(products){
      this.products = products;
  }
}
document.addEventListener("DOMContentLoaded", function() {

    // fetchProducts().then(data=>{
    //   displayTypes(data),
    //   displayProducts(data)
    // });
    pdata= new ProductData();
    pdata.products.then(data=>{
      displayProducts(data)
      displayTypes(data)
    });
    sortBy();
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
            <th class="text-end hideable">السعر</th>
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
            <td class ="hideable">`+  data[i]['price']       +`</td>
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
  // fetchProducts()
  pdata.products
    .then(products => filterProducts(products, selectValue))
    .then(filteredProducts => displayProducts(filteredProducts));
});

// // Function to filter the products based on the selected value ex(Vaden, SORL,...etc)
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
hidePrice=()=>{
  let price= document.getElementsByClassName("hideable");
  let check = document.getElementById("checkbox");
  if(check.checked){
  for (let i = 0;i<price.length;i++){
    price[i].style.display="none"
  }
}
  else{
    for (let i = 0;i<price.length;i++){
      price[i].style.display="table-cell"
    }
  }
}

download=(headers,values)=>{
  let filteredData = [];
  let input = document.getElementById("search");
  let selectValue=document.getElementById("selectValue").value;
  // fetchProducts()
  pdata.products
  .then(data=>{
    input? //if there is a search print with the values of the search 
    printAllProducts(
      (selectValue!="ALL")?data.filter(product => product.type_name == selectValue):data
      ,headers,values): // Else print the value that is selected.
    printAllProducts(
      data.filter(x=>x.pname.includes(input.value))
      ,headers,values)
  });
  console.log("Done");
}
function printAllProducts(data,headers,values) {
  let printWindow = window.open('', '_blank');
  printWindow.document.write('<html><head><title>Print All Products</title></head><body>');
  printWindow.document.write('<h1>All Products</h1>');
  printWindow.document.write('<table border="1">');
  printWindow.document.write(`
                              <tr>
                                ${headers.notes?"<th>ملاحظات</th>":""}
                                ${headers.madein?"<th>المنشأ</th>":""}
                                ${headers.type_name?"<th>النوع</th>":""}
                                ${headers.property?"<th>وصف</th>":""}
                                ${headers.total?"<th>اجمالي سعر الشراء</th>":""}
                                ${headers.sellprice?"<th>بيع</th>":""}
                                ${headers.price?`<th class="hideable">السعر</th>`:""}
                                ${headers.quantity?"<th>الكمية</th>":""}
                                ${headers.pname?"<th>الاسم</th>":""}
                                ${headers.sku?"<th>الرقم</th>":""}
                              </tr>`);

  let sumOfPrice=0;
  let sumOfSellPrice=0;
  let total =0;
  for (let i = 0; i < data.length; i++) {
    total=0;
    total =parseFloat(data[i]['price']) * parseFloat(data[i]['quantity']);
    /*
    The Following code is as follows:
    if you want to display the header with empty columns you can do it 
    if you want to display the values without the header it is not possible 
    */
    printWindow.document.write(`
    <tr>
    ${headers.notes?`<td></td>`:""}
    ${headers.madein?`<td>${values.madein?data[i]['madein']:""}</td>`:""}
    ${headers.type_name?`<td>${values.type_name?data[i]['type_name']:""}</td>`:""}
    ${headers.property?`<td>${values.property?data[i]['property']:""}</td>`:""}
    ${headers.total?`<td>${total}</td>`:""}
    ${headers.sellprice?`<td>${values.sellprice?data[i]['sellprice']:""}</td>`:""}
    ${headers.price?`<td class="hideable">${values.price?data[i]['price']:""}</td>`:""}
    ${headers.quantity?`<td>${values.quantity?data[i]['quantity']:""}</td>`:""}
    ${headers.pname?`<td>${values.pname?data[i]['pname']:""}</td>`:""}
    ${headers.sku?`<td>${values.sku?data[i]['sku']:""}</td>`:""}
    <td>${i+1}</td>
    </tr>
    `);
    sumOfPrice+=total;
    sumOfSellPrice+=parseFloat(data[i]['sellprice']);
  }
  if(headers.total)
  printWindow.document.write(`
    <tr>
    <td>اجمالي سعر الشراء</td>
    <td class="hideable">${sumOfPrice}</td>
    </tr>
    <tr>
    <td>اجمالي سعر البيع</td>
    <td class="hideable">${sumOfSellPrice}</td>
    </tr>
  `)

  printWindow.document.write('</table></body></html>');
  printWindow.document.close();
  printWindow.print();
}
test=()=>{
  let headers={
    "madein":document.getElementById("madein").checked,
    "type_name":document.getElementById("type_name").checked,
    "property":document.getElementById("property").checked,
    "sellprice":document.getElementById("sellprice").checked,
    "price":document.getElementById("price").checked,
    "quantity":document.getElementById("quantity").checked,
    "pname":document.getElementById("pname").checked,
    "sku":document.getElementById("sku").checked,
    "notes":document.getElementById("notes").checked
  }
  let values={
    "madein":document.getElementById("madein_value").checked,
    "type_name":document.getElementById("type_name_value").checked,
    "property":document.getElementById("property_value").checked,
    "sellprice":document.getElementById("sellprice_value").checked,
    "price":document.getElementById("price_value").checked,
    "quantity":document.getElementById("quantity_value").checked,
    "pname":document.getElementById("pname_value").checked,
    "sku":document.getElementById("sku_value").checked,
  }
  download(headers,values); 
}
sortBy=()=>{
  value=document.getElementById("sortBy").value;
  pdata.products.then(products=>{
    products.sort((a, b) => a[value].localeCompare(b[value]));
    displayProducts(products);
  })
}