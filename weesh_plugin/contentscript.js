var listImg = [];
var listUrl = [];
var listPrices = [];
var listNames = [];

var btn = [];
var nodes = [];
var url = [];


chrome.runtime.onMessage.addListener(function(request, sender, sendResponse) {
    console.log("URL CHANGED: " + request.data.url);
    window.setTimeout(partA,500);
    window.setTimeout(partA,3000);
    window.setTimeout(partA,6000);
});

function partA() { 
    
    //Amazon
    var a = document.getElementById('s-results-list-atf');
    //var b = document.getElementsByClassName('a-size-base a-color-price s-price a-text-bold');
    var c = document.getElementById('submit.add-to-cart-announce');
    var ubaldi = document.getElementById('main-liste-articles');
    var ubaldiBig = document.getElementsByClassName('ajaxBt btn btn-lg btn-panier btn-icone bi-panier-ajout bi-gauche');
    var darty = document.getElementsByClassName('product_detail next_prev_info');
    var dartyBig = document.getElementsByClassName('retirer_magasin');
    
    
    if(a!=null) amazonPutButton(a);
    if(c!=null) addBigButton(c, "a-button a-spacing-small a-button-primary a-button-icon",
                             'landingImage', 'priceblock_saleprice', 'landingImage');
    
    
    
    if(ubaldi!=null) ubaldiButton(ubaldi);
    if(ubaldiBig.length>0) {
        var myBton = addBigButton(ubaldiBig[0],"","","","");
        if (typeof myBton != 'undefined') myBton.className = "btn btn-lg";
    }
    
    if(darty!=null) dartyButton(darty);
    if(dartyBig.length>0) {
        var myBton = addBigButton(dartyBig[0],"","v6horizontal_new_product_page_sizes darty_product_img","product_price font-novecentosSWBD","darty");
        if (typeof myBton != 'undefined') {
            myBton.className = "btn btn-lg";
            myBton.style.marginTop = '10px';
        }
    }
    
    
    
    
    
    //Google search
    //var b = document.getElementsByClassName('_QD _pvi');
    

    //if(a!=null) addManyButtons(a);
    //if(b!=null) addManyButtons(b);
    
}
function dartyButton(a) {
    var count = a.length;
    if(listPrices.length == count)return;
    for(var i = 0 ; i < count ; i++) {
        var img = a[i].getElementsByTagName('img')[0].src;
        var name = a[i].getElementsByTagName('img')[0].alt;
        var url = a[i].getElementsByTagName('a')[0].href;
        var price = a[i].getElementsByClassName('sale_price')[0].innerText;
        listImg.push(img);
        listNames.push(name);
        listPrices.push(price);
        listUrl.push(url);
        
        var btn = addButton(listImg.length-1,a[i]);
        btn.style.marginBottom = "15px";
        btn.style.marginLeft = "75%";
        btn.style.width = '154px';
        btn.style.height = '40px';
    }
}

function ubaldiButton(a) {
    
    var count = a.children.length;
    var listLi = a.getElementsByClassName('la-article zc-parent clearfix');
    
    for(var i = 0 ; i < count ; i++) {
        if (document.getElementById('weeshButtonAdded'+i)) continue;
        if(typeof listLi[i] == "undefined") continue;
        
        var img = listLi[i].getElementsByClassName('img-placeholder img-defer img-ratio-cc la-img');
        var price = listLi[i].getElementsByClassName('prix rebours-prix rebours-inited');
        var link = img[0].getElementsByTagName('a')[0].href;

        
        img = img[0].getElementsByTagName('img');
        
        var str = img[0].dataset.src;
        var str2 = img[0].src;
        
        if (typeof img[0].dataset.src != "undefined" && str.length > 2) listImg.push(img[0].dataset.src);
        if (typeof img[0].src != "undefined" && str2.length > 2) listImg.push(img[0].src);
        
        listNames.push(img[0].alt);
        listUrl.push(link);
        listPrices.push(price[0].dataset.prixVente);

        var btn = addButton(listImg.length-1,listLi[i]);
        var css = listLi[i].getElementsByClassName('rebours-clignote la-prix-inner clignote-inited')[0];
        //btn.style.position = "relative";
        btn.style.marginBottom = "15px";
        btn.style.marginLeft = "76%";
        //btn.style.width = "100%";
        //btn.style.cssFloat = "right";
        //btn.style.top = (css.offsetParent.offsetTop + css.offsetTop) + "px";
        //btn.style.left = (15 +css.offsetWidth + css.offsetLeft) + "px";
        
    }
}


function amazonPutButton(a){
    
    var count = a.children.length;
    var listLi = a.getElementsByTagName('li');

    
    for(var i = 0 ; i < count ; i++) {
        if (document.getElementById('weeshButtonAdded'+i)) continue;
        if (typeof listLi[i] == "undefined") continue;
        if( typeof listLi[i].getElementsByTagName('img')[0] != "undefined"
          && typeof listLi[i].getElementsByTagName('h2')[0] != "undefined"
          && typeof listLi[i].getElementsByTagName('a')[0] != "undefined"
          ) {
            
            listImg.push(listLi[i].getElementsByTagName('img')[0].src);
            listNames.push(listLi[i].getElementsByTagName('h2')[0].innerHTML);
            listUrl.push(listLi[i].getElementsByTagName('a')[0].href);
            
            if(typeof listLi[i].getElementsByClassName('a-size-base a-color-price a-text-bold')[0] != "undefined")              {
                listPrices.push(listLi[i]
                            .getElementsByClassName('a-size-base a-color-price a-text-bold')[0]
                            .innerHTML);
                
                var btn = addButton(listImg.length-1,listLi[i]);
                var css = listLi[i].getElementsByClassName('a-size-base a-color-price a-text-bold')[0];
                
                btn.style.position = "absolute";
                btn.style.top = (200+listLi[i].offsetTop) + "px";
                btn.style.left = (245+ listLi[i].offsetLeft) + "px";
            }
            
            else if (typeof listLi[i].getElementsByClassName('sx-price sx-price-large')[0] != "undefined") {
                console.log(listLi[i].getElementsByClassName('sx-price sx-price-large')[0].innerText);
                listPrices.push(listLi[i].getElementsByClassName('sx-price sx-price-large')[0]
                            .innerText);
                addButton(listImg.length-1,listLi[i]
                      .getElementsByClassName('sx-price sx-price-large')[0]);
            } else {
                listPrices.push("-1");
                continue;
            }
            
        }
    }
    
    var x = 0;
    var re = /(\d)\s+(?=\d)/g;
    
    listPrices.forEach(
        function replaceSpace() {        
            listPrices[x] = listPrices[x].replace(re, '$1,');
            x++;
        }
    );
}

function addButton(i,el){
    
        nodes[i] = document.createElement('IMG');
        btn[i] = document.createElement('BUTTON');
        nodes[i].src = 'https://i.imgsafe.org/b8ff07eb90.png';
        nodes[i].style.float = 'left';
        btn[i].id = 'weeshButtonAdded'+i;
        nodes[i].style.marginTop = '-30px';
        
    
        nodes[i].style.width = '30px';
        nodes[i].style.height = '30px';
        nodes[i].style.zIndex = 1000;
        var p = document.createElement('P');
        p.innerText = "Ajoutez à votre Weeshlist";
        p.style.marginLeft = '30px';
        btn[i].append(p);
        btn[i].style.color="white";
        btn[i].style.backgroundColor = "#934999";    
        btn[i].style.borderRadius="7px";
    
        btn[i].appendChild(nodes[i]);
        btn[i].addEventListener('click', function() {
            addElementInList(this.id);
        }, false);
        //el.style.setProperty ("background-color", "lightgrey", "important");
        insertAfter(el, btn[i]);
    return btn[i];
    
}

function addBigButton(el,clname,srcIm,price,name) {
    console.log(el);
    if (document.getElementById('weeshBigButton0')) return;
    var pntNode = el.parentNode;
    var clone = pntNode.cloneNode(true); // "deep" clone
    var image = document.createElement('IMG');
    image.src = 'https://i.imgsafe.org/b8ff07eb90.png';
    image.style.float = 'left';
    image.style.marginLeft = '2px';
    image.style.width = '23px';
    image.style.height = '23px';
    clone.id = "weeshBigButton0";
	clone.style.paddingTop = "5px";
	clone.style.paddingBottom = "5px";
    clone.innerHTML = "Ajouter à ma Weeshlist";
    clone.appendChild(image);
    clone.className = "";
    clone.className = clname;
    clone.style.color="white";
    clone.style.backgroundColor = "#934999";
    if(clname!="") {
        clone.addEventListener('click', function() {
            addUrlInList(document.location.href, srcIm,price,name);
        }, false);
    } else if(srcIm=="") {
        clone.addEventListener('click', function() {
            addBigButtonUrl(document.location.href);
        }, false);
    } else if (name=='darty') {
        clone.addEventListener('click', function() {
            addUrlDarty(document.location.href,srcIm,price);
        }, false);
    }
    pntNode.parentNode.style.height = "60px";
    pntNode.parentNode.appendChild(clone);
    return clone;
}

function insertAfter(referenceNode, newNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

function addUrlInList(link,srcIm,price,name){

    var srcImg = document.getElementById(srcIm).src;
    var priceSend = document.getElementById(price).innerHTML;
    var nameSend = document.getElementById(name).alt;
     
    chrome.runtime.sendMessage({method:'setItem',url:link,img:srcImg,price:priceSend,name:nameSend});
}

function addUrlDarty(link,srcIm,price,name){

    var srcImg = document.getElementsByClassName(srcIm);
    srcImg = srcImg[0].getElementsByTagName('img');
    var priceSend = document.getElementsByClassName(price)[0].innerText;
    var nameSend = srcImg[0].alt;
     
    console.log(srcImg);
    console.log(srcImg[0].src);
    console.log(srcImg[0].alt);
    chrome.runtime.sendMessage({method:'setItem',url:link,img:srcImg[0].src,price:priceSend,name:nameSend});
}


function addBigButtonUrl(link){
    var srcImg = document.getElementsByClassName("zc-target diapo-full-img diapo-full-img-placeholder")[0].src;
    var price = document.getElementsByClassName('prix rebours-prix rebours-inited');
    var priceSend = price[0].dataset.prixVente;
    var nameSend = document.getElementsByClassName("fa-titre-article")[0].innerText;
        
    if(!priceSend.includes("€")) priceSend = priceSend+" €";
    if(!priceSend.includes("EUR")) priceSend = priceSend.replace("EUR", " ");
    
    chrome.runtime.sendMessage({method:'setItem',url:link,img:srcImg,price:priceSend,name:nameSend});
}


function addElementInList(id) {
    
    var res = id.substring(16);
    var link = listUrl[res];
    var srcImg = listImg[res];
    var priceSend = listPrices[res];
    var nameSend = listNames[res];
    
    if(!priceSend.includes("€")) priceSend = priceSend+" €";
    priceSend = priceSend.replace("EUR", " ");
    
    chrome.runtime.sendMessage({method:'setItem',url:link,img:srcImg,price:priceSend,name:nameSend});
}
