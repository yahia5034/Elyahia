document.addEventListener("DOMContentLoaded", function() {
    // Fetch all products from PHP using AJAX
    function fetchProducts(){
      return fetch("searchBack.php").
        then(response=>response.json()).
        then(data=>{
          displayProducts(data);
        return data;
        });
    }
    
    document.getElementById("selectValue").addEventListener("change", function() {
      const selectValue = this.value;
      fetchProducts()
        .then(products => filterProducts(products, selectValue))
        .then(filteredProducts => displayProducts(filteredProducts));
    });
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
                <td>`+  data[i]['madein']   +`</td>
                <td>`+  data[i]['type_name']   +`</td>
                <td>`+  data[i]['property']    +`</td>
                <td>`+  data[i]['sellprice']   +`</td>
                <td>`+  data[i]['price']       +`</td>
                <td>`+  data[i]['quantity']    +`</td>
                <td><a class="btn" style="color: #000000!important" href="EditProduct.php?sku=`+data[i].sku +`  "> `+  data[i]['pname'] +`</a></td>
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
    // // Function to filter the products based on the selected value
    function filterProducts(products, selectValue) {
      return (selectValue!="ALL")?products.filter(product => product.type_name == selectValue):products;
    }
    // fetchProducts().then(products=>console.log(products));

    fetchProducts().then(data=>
        displayTypes(data));
    
});