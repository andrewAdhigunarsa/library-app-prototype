

//------ Selected category
var currentcategory=0;


$(document).on("ready",function(){


  //getcategories
  //--newcode
  makeAjaxRequest("get","ajax/getcategories.php","",renderCategories);
  //getproducts
  makeAjaxRequest("get","ajax/getproducts.php","",renderProducts);

  //add listener for category selection
    $("#categories").on("click",function(event){
      event.preventDefault();
      // get the data-id attribute of the clicked element
      categoryid = $(event.target).data("id");
      currentcategory = categoryid;
      //find parent of clicked item and all its siblings(all the other<li>) on same level
      //and remove the class "active"
      $(event.target).parent("li").siblings().removeClass("active");
      //find parent of the clicked item (the <li> element) and add class active to it
      $(event.target).parent("li").addClass("active ");
      //create data in json format
      data = {category:categoryid};
      //send json data in ajax request to getproducts.php

      makeAjaxRequest("get","ajax/getproducts.php", data, renderProducts);
      makeAjaxRequest("post","ajax/getloan.php",data,renderLoan);
      // makeAjaxRequest("post","ajax/getloan.php",data,renderBadge);

  });
});


  // // add listener for search
  //   $("#seachbutton").click(function(){
  //     var txt = $("#search_text").val();
  //     var data={search:txt};
  //     console.log(data);
  //     if(txt != '')
  //     {
  //        makeAjaxRequest('get','ajax/getsearch.php',data,renderProducts);
  //     }else{
  //
  //     }
  // });

// $("#search").on("submit",function(event){
//   event.preventDefault();
//   var txt = $("#search_text").val();
//
//   console.log(data);
//   if(txt != '')
//   {
//     var data={search:txt};
//      makeAjaxRequest('get','ajax/getsearch.php',data,renderProducts);
//   }else{
//
//   }
// });
$("#search_text").keyup(function(event){
  // event.preventDefault();
  var txt = $("#search_text").val();

  // console.log(data);
  if(txt != '')
  {
    var data={search:txt};
     makeAjaxRequest('get','ajax/getsearch.php',data,renderProducts);
  }else{

  }
});


// $("#formreturn").on("submit",function(event){
// // event.preventDefault();
//   var id= $("#bookid").html();
//   var data={returnid:id};
//   makeAjaxRequest('post','ajax/delete.php',data,renderLoan);
// });
//delegate the listener to the parent element instead of the form
//the reason it did not work is because the listener was attached to an element that is
//generated by javascript
$("#loanbox").on("click",function(event){
  console.log(event.target);
  //stop the default form submitting
  event.preventDefault();
  //get the id from the button's value attribute
  var id= $(event.target).attr("value");
  var data={returnid:id};
  console.log(data);
  makeAjaxRequest('post','ajax/delete.php',data,renderLoan);
  makeAjaxRequest("post","ajax/getloan.php",data,renderLoan);
  // makeAjaxRequest("post","ajax/getloan.php",data,renderBadge);
});

//
// function renderBadge(loan){
//   $("#badge").empty();
//   $("#badge").removeClass();
//   if(loan.length>0){
//     var totalloan=loan.lenght;
//     $('#badge').append(totalloan);
//   }else{
//     var totalloan=0;
//     $('#badge').append(totalloan);
//
//   }
// }

;//renderProducts on the page
function renderProducts(books){
  $("#products").empty();
  $("#products").removeClass();
  if(books.length>0){
    for(i=0;i<books.length;i++){
    var id=books[i].book_id;
    var title=books[i].title;
    var picture=books[i].picture;
    var author=books[i].author;
    var description=books[i].book_description;
    var product =
    '<div class="col-xs-12 col-sm-12 col-md-12 thumbnail">'+
    '<a href="detail.php?id='+id+'"  data-id="'+id+'" data-title="'+title+ '" data-picture="'+picture+'" data-description="'+description+'">'+
    '<div class="col-xs-12 col-sm-12 col-md-9">'+
    '<img class="col-xs-6 col-sm-4" src="'+picture+'" alt="" />'+
    '<h4>'+title+'</h4>'+'<p>'+author+'</p>'+'<p>'+description+'</p>'+
    '</div>'+
    '</a>'+
    '</div>';
    $('#products').append(product);
    }
  }
}
$(document).on("ready",function(){
  var data=0;
  makeAjaxRequest("post","ajax/getloan.php",data,renderLoan);
});

//render loan
function renderLoan(loan){
  // console.log(loan);
  $("#loanbox").empty();
  $("#badge").empty();
  $("#loanbox").removeClass();

  // window.alert(loan.length);
  if(loan.length>0){
    var totalloan=loan.lenght;
    for(l=0;l<loan.length;l++){

      // $("#badge").removeClass();
      var id=loan[l].book_id;
      var title=loan[l].title;
      var picture=loan[l].picture;

      var author=loan[l].author;
      var description=loan[l].short_description;
      var loandate=loan[l].loan_date;
      var datedue=loan[l].date_due;
      //make sure that all element ids are unique in the page
      //if there are multiple items in the loanbox, then there will be a conflict of ids,
      //preventing the javascript from being able to get the value from the correct element
      //instead, put the book id as a value of the button.
      var loanitem=
      '<tr>'+
      '<td class=\'bookid\'>'+id+'</td>'+
      '<td>'+
      '<img class=\'col-xs-12\' src='+picture+'>'+
      '</td>'+
      '<td>'+title+'</td>'+
      '<td class=\'hidden-xs\'>'+author+'</td>'+
      '<td class=\'hidden-xs\'>'+description+'</td>'+
      '<td>'+datedue+'</td>'+
      '<td>'+'<form id=form"'+id+'" method="post" class="return-form">'+
      '<button class=\'btn btn-info\' id=\'returnButton\' value="'+id+'" type=\'submit\' role=\'submit\'>RETURN</button>'+'</form>'+
      '</td>'+
      '</tr>';
      $('#loanbox').append(loanitem);

      // console.log(totalloan);
    }
    $("#badge").append(loan.length);
  }
   else{
      var loanitem =
      '<h3>No items to return</h3>';

      $('#loanbox').append(loanitem);
      $('#badge').append(0);

   }
}

//render categories on page
function renderCategories(categories){
  //class active highlight the active tab with bootstrap class active
  allcategory = '<li class="active"><a href="#" data-id="0">All</a></li>';
  $("#categories").append(allcategory);
  for(i=0;i<categories.length;i++){
    id=categories[i].category_id;
    name=categories[i].category_name;
    category= '<li><a href="#" class=" " data-id="'+id+'">'+name+'</a></li>';
    $("#categories").append(category);
  }

}

function makeAjaxRequest(method,targeturl,data,callback){
  $.ajax({
    type:method,
    url:targeturl,
    data:data,
    dataType:"json",
    encode:true
  })
  .done(function(data){
    // console.log(data);
    //when server responds, we call the callback function
    //and pass the data
    callback(data);
  });
}