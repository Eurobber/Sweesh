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
    
    if(a!=null) amazonPutButton(a);
    if(c!=null) addBigButton(c);
    if(ubaldi!=null) ubaldiButton(ubaldi);
    
    
    //Google search
    //var b = document.getElementsByClassName('_QD _pvi');
    

    //if(a!=null) addManyButtons(a);
    //if(b!=null) addManyButtons(b);
    
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
    
    console.log(listImg);
    console.log(listNames);
    console.log(listUrl);
    console.log(listPrices);
}

function addButton(i,el){
    
        nodes[i] = document.createElement('IMG');
        btn[i] = document.createElement('BUTTON');
        nodes[i].src = 'https://i.imgsafe.org/b8ff07eb90.png';
        nodes[i].style.float = 'left';
        btn[i].id = 'weeshButtonAdded'+i;
        nodes[i].style.marginRight = '15px';
        nodes[i].style.width = '15px';
        nodes[i].style.height = '15px';
        nodes[i].style.zIndex = 1000;
        btn[i].innerText = "+";
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
/*
function addManyButtons(el) {
    
    for (var j = 0; j < el.length; j++) {
        if (document.getElementById('weeshButtonAdded'+j))continue;
        url[j] = el[j].parentNode;
        url[j] = url[j].getAttribute("href");
        
        nodes[j] = document.createElement('IMG');
        btn[j] = document.createElement('BUTTON');
        nodes[j].src = 'https://i.imgsafe.org/b8ff07eb90.png';
        nodes[j].style.float = 'left';
        btn[j].id = 'weeshButtonAdded'+j;
        nodes[j].style.marginRight = '15px';
        nodes[j].style.width = '15px';
        nodes[j].style.height = '15px';
        nodes[j].style.zIndex = 1000;
        btn[j].innerText = "+";
        btn[j].appendChild(nodes[j]);

        btn[j].addEventListener('click', function() {
            addElementInList(this.id);
        }, false);
        
        el[j].style.setProperty ("background-color", "lightgrey", "important");
        insertAfter(el[j].parentNode, btn[j]);
    }
}*/

function addBigButton(el) {
    if (document.getElementById('weeshBigButton0'))return;
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
    clone.innerHTML = "Ajouter à ma liste Weesh";
    clone.appendChild(image);
    clone.className = "";
    clone.className = "a-button a-spacing-small a-button-primary a-button-icon";
    clone.style.color="white";
    clone.style.backgroundColor = "#934999";
    clone.addEventListener('click', function() {
            addUrlInList(document.location.href);
        }, false);
    pntNode.parentNode.style.height = "60px";
    pntNode.parentNode.appendChild(clone);
}

function insertAfter(referenceNode, newNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

function addUrlInList(link){
    var srcImg = document.getElementById('landingImage').src;
    var priceSend = document.getElementById('priceblock_saleprice').innerHTML;
    var nameSend = document.getElementById('landingImage').alt;
        
    chrome.runtime.sendMessage({method:'setItem',url:link,img:srcImg,price:priceSend,name:nameSend});
}


function addElementInList(id) {
    
    var res = id.substring(16);
    var link = listUrl[res];
    var srcImg = listImg[res];
    var priceSend = listPrices[res];
    var nameSend = listNames[res];
    
    if(!priceSend.includes("€")) priceSend = priceSend+" €";
    if(!priceSend.includes("EUR")) priceSend = priceSend.replace("EUR", " ");
    
    chrome.runtime.sendMessage({method:'setItem',url:link,img:srcImg,price:priceSend,name:nameSend});
}
