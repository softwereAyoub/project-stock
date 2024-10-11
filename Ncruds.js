var title=document.getElementById('inp1');
var price=document.getElementById('inp2');
var taxes=document.getElementById('inp3');
var ads=document.getElementById('inp4');
var discount=document.getElementById('inp5');
var total=document.getElementById('spn');
var count=document.getElementById('inp6');
var category=document.getElementById('inp7');
var search=document.getElementById('search');
var create=document.getElementById('btn1');
var searchbytitle=document.querySelector('.btn2');
var searchbycategory=document.querySelector('.btn3');
var table=document.getElementById('tab');
var butupdate=document.createElement('button');
let spn=document.getElementById('spn')
var numer=document.getElementById('numero');
var butdelete=document.createElement('button');
butupdate.innerHTML='Update';
butdelete.innerHTML='Delete';
var numero=0



  
    
        
if(localStorage.getItem('status')){
    
    window.alert=function(){
        var card=document.getElementById('alert');
        card.style.display='flex';

        var button=document.getElementById('btnalert');
button.onclick=function(){
    
    card.style.display='none';
        var lien=document.createElement('a');
    lien.href='login.php';
    lien.click();
    }
       
}
alert()
}else{
    localStorage.removeItem('paye');
    
}
    




var dataproj;
if(localStorage.product){
    dataproj=JSON.parse(localStorage.product);
}
else{
    var dataproj=[];
}
console.log(dataproj.length);

create.onclick=function(){
    if(create.innerHTML=='Create' && !localStorage.getItem('status') && Number(count.value )<= 30){
    var dataprod={
        title:title.value,
        price:price.value,
        taxes:taxes.value,
        ads:ads.value,
        discount:discount.value,
        total:Number(price.value)+Number(taxes.value)+Number(ads.value)-Number(discount.value),
        count:count.value,
        category:category.value
    }
    console.log(Number(total.innerHTML));
    
    var id=dataproj.length+1
    for(j=1;j<=Number(dataprod.count);j++){
        dataproj.push(dataprod)
        localStorage.setItem('product',JSON.stringify(dataproj))
    }
    


    for(j=1;j<=Number(dataprod.count);j++){

        numero=numero+1;
        numer.innerHTML=numero+' Products';
    let i=j-1
    var row=table.insertRow();
     var idcell=row.insertCell(0);
     idcell.innerHTML=id;
     var titlecell=row.insertCell(1);
     titlecell.innerHTML=dataprod.title;
     var pricecell=row.insertCell(2);
     pricecell.innerHTML=dataprod.price;
     var taxescell=row.insertCell(3);
     taxescell.innerHTML=dataprod.taxes;
     var adscell=row.insertCell(4);
     adscell.innerHTML=dataprod.ads;
     var discocell=row.insertCell(5);
     discocell.innerHTML=dataprod.discount;
     var totalcell=row.insertCell(6);
     totalcell.innerHTML=dataprod.total;
     var categcell=row.insertCell(7);
     categcell.innerHTML=dataprod.category;
     var buttupdatecell=row.insertCell(8);
     var butt2update=butupdate.cloneNode(true)
     let index=j;
     butt2update.onclick=function(){
        title.value=dataproj[index].title
        price.value=dataproj[index].price
        taxes.value=dataproj[index].taxes
        ads.value=dataproj[index].ads
        discount.value=dataproj[index].discount
        total.innerHTML=dataproj[index].total
        console.log(dataproj[index].total);
        
        category.value= dataproj[index].category
     create.innerHTML='MODIFY'
     
 localStorage.setItem('id',index);
 scrollTo(0,0);
     }

     buttupdatecell.appendChild(butt2update)
    
     
     var buttdeletecell=row.insertCell(9);
     var butt2delete=butdelete.cloneNode(true)
     butt2delete.onclick=function(){
        
        dataproj.splice(i,1);
       table.rows[i+1].style.display='none';
        localStorage.setItem('product',JSON.stringify(dataproj))
       

        numero=numero-1;
        numer.innerHTML=numero+' Products';
              
        }
     buttdeletecell.appendChild(butt2delete)
     id=id+1

    
    }

      title.value=''
     price.value=''
     taxes.value=''
     ads.value=''
     discount.value=''
      total.value=''
      count.value=''
      category.value=''

      location.reload()
}
else{
for(i=1;i<table.rows.length;i++){
    ;
  if(table.rows[i].cells[0].innerHTML==localStorage.id){
    var dataprod={
        title:title.value,
        price:price.value,
        taxes:taxes.value,
        ads:ads.value,
        discount:discount.value,
        total:Number(price.value)+Number(taxes.value)+Number(ads.value)-Number(discount.value),
        count:count.value,
        category:category.value
    }
    table.rows[i].cells[0].innerHTML=localStorage.id;
    table.rows[i].cells[1].innerHTML=title.value;
    table.rows[i].cells[2].innerHTML=price.value;
    table.rows[i].cells[3].innerHTML=taxes.value;
    table.rows[i].cells[4].innerHTML=ads.value;
    table.rows[i].cells[5].innerHTML=discount.value;
    table.rows[i].cells[6].innerHTML=Number(price.value)+Number(taxes.value)+Number(ads.value)-Number(discount.value);
    table.rows[i].cells[7].innerHTML=category.value;
  
    dataproj[Number(localStorage.id)-1]=dataprod;
    localStorage.setItem('product',JSON.stringify(dataproj))
  }
}
title.value=''
price.value=''
taxes.value=''
ads.value=''
discount.value=''
count.value=''
category.value=''
total.innerHTML='TOTAL :'
total.style.backgroundColor="red"
create.innerHTML='Create';
}
}
var array=[]
var ind=[]
localStorage.setItem('row','test')


function crt(){
 if(!localStorage.getItem('status')) {
    for(i=0;i<dataproj.length;i++){
        numero=numero+1;
        numer.innerHTML=numero+' Products';
            var row=table.insertRow();
            var idcell=row.insertCell(0);
            idcell.innerHTML=i+1;
            var titlecell=row.insertCell(1);
            titlecell.innerHTML=dataproj[i].title;
            console.log(dataproj[i].title);
            var pricecell=row.insertCell(2);
            pricecell.innerHTML=dataproj[i].price;
            var taxescell=row.insertCell(3);
            taxescell.innerHTML=dataproj[i].taxes;
            var adscell=row.insertCell(4);
            adscell.innerHTML=dataproj[i].ads;
            var discocell=row.insertCell(5);
            discocell.innerHTML=dataproj[i].discount;
            var totalcell=row.insertCell(6);
            totalcell.innerHTML=dataproj[i].total;
            var categcell=row.insertCell(7);
            categcell.innerHTML=dataproj[i].category;
            var buttupdatecell=row.insertCell(8);
            var butt2update=butupdate.cloneNode(true)
            let index2=i+1;
            let index =i
            butt2update.onclick=function(){
           title.value=dataproj[index].title
           price.value=dataproj[index].price
           taxes.value=dataproj[index].taxes
           ads.value=dataproj[index].ads
           discount.value=dataproj[index].discount
           category.value= dataproj[index].category
           create.innerHTML='MODIFY'
       localStorage.setItem('id',index2);
       scrollTo(0,0);
       if(price.value.length>0 && taxes.value.length>0 && ads.value.length>0){
    
        spn.style.backgroundColor='green'
        total.style.backgroundColor='green'
        total.innerHTML='TOTAL :'+dataproj[index].total;
        console.log(dataproj[index].total);
        
      }
      else{
        spn.style.backgroundColor='red'
        total.style.backgroundColor='red'
      }


              
                }
              
            buttupdatecell.appendChild(butt2update)
       
           
            var buttdeletecell=row.insertCell(9);
            var butt2delete=butdelete.cloneNode(true)
            butt2delete.onclick=function(){
                
               array.push(index)
               localStorage.setItem('array',JSON.stringify(array))
               console.log(array);
               
                table.rows[index+1].style.display='none';
                ind.push(index+1);
          
                numero=numero-1;
                numer.innerHTML=numero+' Products';
                }
            buttdeletecell.appendChild(butt2delete)
           
        
    }
}
}

searchbycategory.onclick=function(){
    search.placeholder='Search by category'
}
searchbytitle.onclick=function(){
    search.placeholder='Search by title';
}
var x=0;
function testt(item){
if(j!=item){
    
    table.rows[j].style.display='table-row';
}
}
onkeyup=function(eve){
    if(price.value.length>0){
        localStorage.setItem('inp1',price.value)
    }
   else{
    localStorage.removeItem('inp1')
   }
    if(taxes.value.length>0){
        localStorage.setItem('inp2',taxes.value)
    }
    else{
        localStorage.removeItem('inp2')
       }
    
    if(ads.value.length>0){
        localStorage.setItem('inp3',ads.value)
    }
    else{
        localStorage.removeItem('inp3')
       }
    if(discount.value.length>0){
        localStorage.setItem('inp4',discount.value)
    }
    else{
        localStorage.removeItem('inp4')
       }


    if(price.value.length>0 && taxes.value.length>0 && ads.value.length>0){
    
        spn.style.backgroundColor='green'
        total.style.backgroundColor='green'
      }
      else{
        spn.style.backgroundColor='red'
        total.style.backgroundColor='red'
      }
     
      if(price.value.length>0 && taxes.value.length>0 && ads.value.length>0){
        somme=Number(localStorage.getItem('inp1'))+Number(localStorage.getItem('inp2') )+ Number(localStorage.getItem('inp3'))
        console.log(Number(localStorage.getItem('inp3')));
        
        if(discount.value.length>0){
            somme-=Number(localStorage.getItem('inp4'));
        }
        console.log(somme);
        
       somme=String(somme)
       total.innerHTML='TOTAL :'+somme;
       localStorage.setItem('total',Number(somme));
        }
        else{
            total.innerHTML='TOTAL :'; 
            
        }  

    if(search.value!='' &&  search.placeholder=='Search by title'){
        for(j=1;j<table.rows.length;j++){
            var motif=search.value;
            var regex=new RegExp(motif);
            var array=localStorage.getItem('array')
            var array = JSON.parse(array)
            if(!regex.test(table.rows[j].cells[1].innerHTML)){
                table.rows[j].style.display='none';
            }
         else{
            if(ind.length!=0){
                ind.forEach(testt)
               }
               else{
                table.rows[j].style.display='table-row';
               }
                  
         }
           
           
                
             
            
                
            
           

      
        }
    }
    else if(search.value!='' && search.placeholder=='Search by category' ){
        for(j=1;j<table.rows.length;j++){
            var motif=search.value;
            var regex=new RegExp(motif);
            if(!regex.test(table.rows[j].cells[7].innerHTML)){
                table.rows[j].style.display='none';
            }
            else{
                if(ind.length!=0){
                    ind.forEach(testt)
                   }
                   else{
                    table.rows[j].style.display='table-row';
                   }
                      
             }
         
        }
    }
   
    
   
    if(search.value=='' && (search.placeholder=='Search by category'|| search.placeholder=='Search by title') && (eve.code.length<=2  && eve.code!='Keyr' || eve.code=='Backspace') && x==0){
       
       
        for(j=1;j<table.rows.length;j++){
       
         
                
            
          
            if(ind.length!=0){
                ind.forEach(testt)
               }
               else{
                table.rows[j].style.display='table-row';
               }

    }

  
}
}

    
function test(item){
    dataproj.splice(item,1);
}
onload=function(){
var array=localStorage.getItem('array')
if(array){
    var array = JSON.parse(array)
    array.sort(function(a, b){return b-a});
    array.forEach(test)
    console.log(array);
    
     localStorage.setItem('product',JSON.stringify(dataproj))
}
localStorage.removeItem('array')

    crt();

}



