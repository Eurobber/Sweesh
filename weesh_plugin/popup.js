var delIndex;
var imgs = [];
var urls = [];
var names = [];
var prices = [];
var weeshListId;
var localUserName;

function isLogged(username){
        $('#msgErrorLog').hide();
        $('#msgSuccessLog').show();
        $('#formConnect').hide();
        $('#connectButton').hide();
        $('#registerButton').hide();
        $('#loggedDiv').show();
        $('#deconnect').show();
        $('#tab3').show();    
        localUserName = username;
        setWeeshListes(username);
        $("#msgSuccessLog").html("Bienvenue "+username+" !");
    }

chrome.runtime.sendMessage({method:'getUrls'}, function(listUrls){
    if (typeof listUrls != 'undefined' && listUrls != null && listUrls.length != 0) 
	{
        urls = listUrls;
        urls.forEach(myFunction);
        
		chrome.storage.sync.get("localUsername", function(data) {
            if(data['localUsername'] != 'undefined_username') {
                isLogged(data['localUsername']);
                
                chrome.storage.sync.get('localWeeshListId', function(data) {
                    console.log(data['localWeeshListId']);
                    
                    $.ajax({
                        type: "POST",
                        url: "http://localhost:8888/Weesh/new_sources_rest.json",
                        data: {
                            'url':urls,
                            'weeshlistid': data['localWeeshListId']
                        },
                        success: function(data){
                            console.log("data suuccess get sources");
                            console.log(data);
                        },
                        error: function(data){
                            console.log("data error get sources");
                            console.log(data);
                        }
                    });
                });
		      }
	       });
	}
        
		
        
             
        chrome.runtime.sendMessage({method:'getImgs'}, function(img){
            if (typeof img != 'undefined' && img != null && img.length != 0) {
                setImgs(img);
                
                chrome.storage.sync.get("localImgList", function(imgsL) {
                    if(typeof imgsL['localImgList'] != 'undefined') 
                        imgs = imgsL['localImgList'].concat(imgs);
                    chrome.storage.sync.set({'localImgList':imgs}, function() {});
                });
            }
        });
        
        chrome.runtime.sendMessage({method:'getNames'}, function(name){
            if (typeof name != 'undefined' && name != null && name.length != 0) {
                setNames(name);
                
                chrome.storage.sync.get("localNameList", function(namesL) {
                    if(typeof namesL['localNameList'] != 'undefined') 
                        names = namesL['localNameList'].concat(names);
                    chrome.storage.sync.set({'localNameList':names}, function() {});
                });
            }
        });
        chrome.runtime.sendMessage({method:'getPrices'}, function(price){
            if (typeof price != 'undefined' && price != null && price.length != 0) {
                setPrices(price);
                
                chrome.storage.sync.get("localPriceList", function(pricesL) {
                    if(typeof pricesL['localPriceList'] != 'undefined')
                        prices = pricesL['localPriceList'].concat(prices);
                    chrome.storage.sync.set({'localPriceList':prices}, function() {});
                });
            }
        });

        chrome.storage.sync.get("localUrlList", function(items) {
            if(typeof items['localUrlList'] != 'undefined')
                urls = items['localUrlList'].concat(urls);
            
            chrome.storage.sync.set({'localUrlList':urls}, function() {});
        });
        chrome.runtime.sendMessage({method:'resetItems'}, function(urls){});
});

function setImgs(img) {
    imgs = img; 
    var i = 0;
    $("#list img").each(function() {
        if ($(this).attr("src")=="null") {
            $(this).attr("src", imgs[i]);
            i++;
        }
        });    
}

function setNames(name) {
    names = name;
    var j = 0;
    
    $("#list a").each(function() {
            if($(this).text() == "null") { 
                $(this).text(names[j]);
                j++;
            }
        }); 
}

function setPrices(price){
    prices = price;
    var j = 0;
    $("#list span").each(function() {
        if($(this).text() == "") {
            $(this).text(prices[j]);
            j++;
        }
        }); 
}

function myFunction(item, index) {
    
    if(item==null)return;
    $('#clear').show();
    $('#msgWeeshEmpty').hide();
    
    index = $('#list li').length;
    $('#list').append('<li id="elementInWeeshList'+index+'"><img class="imgItem" src="null" alt="" id="uneImage" /><span classe="price"></span><button type="button" class="btn btn-danger delete">X</button><a href="'+item+'">null</a></li>');
    $('#list li:last-child').on('click', 'a', function(){
        chrome.tabs.create({url: $(this).attr('href')});
        return false;
    });
    
    $(document).on('click', '.delete', function() {
        var index = $(this).parent().attr('id');
        index = index.substr(18); 
        delIndex = index;
        chrome.storage.sync.get('localUrlList', function(items) {
            if (!chrome.runtime.error) {
                items['localUrlList'].splice(delIndex,1);
                chrome.storage.sync.set({'localUrlList':items['localUrlList']}, function() {
                    
                });
            }
        });
        
        chrome.storage.sync.get('localImgList', function(items) {
            if (!chrome.runtime.error) {
                items['localImgList'].splice(delIndex,1);
                chrome.storage.sync.set({'localImgList':items['localImgList']}, function() {
                });
            }
        });
        
        chrome.storage.sync.get('localNameList', function(items) {
            if (!chrome.runtime.error) {
                items['localNameList'].splice(delIndex,1);
                chrome.storage.sync.set({'localNameList':items['localNameList']}, function() {
                });
            }
        });
        
        chrome.storage.sync.get('localPriceList', function(items) {
            if (!chrome.runtime.error) {
                items['localPriceList'].splice(delIndex,1);
                chrome.storage.sync.set({'localPriceList':items['localPriceList']}, function() {
                });
            }
        });
        
        $(this).parent().remove();
        refreshId();
    });
}

function refreshId(){
    var count = 0;
    $('#list').find('li').each(function(){
            var current = $(this);
            current.attr("id","elementInWeeshList"+count);
            count++;
        });
}

$("#clear").click( function() {
    $('#clear').hide();
    chrome.storage.sync.set({'localUrlList':[]}, function() {
        $('#list').empty();
    });
    chrome.storage.sync.set({'localImgList':[]}, function() {
    });
    chrome.storage.sync.set({'localNameList':[]}, function() {
    });
    chrome.storage.sync.set({'localPriceList':[]}, function() {
    });
});


chrome.storage.sync.get("localUrlList", function(items) {
if (!chrome.runtime.error) {
    if (items['localUrlList'] != null) {
        elements = items['localUrlList'];
        $('#list').empty();
        elements.forEach(myFunction);
        
        chrome.storage.sync.get("localImgList", function(items) {
            if (items['localImgList'] != null) {
                elements = items['localImgList'];
                setImgs(elements);
            }
        });
        
        chrome.storage.sync.get("localNameList", function(items) {
            if (items['localNameList'] != null) {
                elements = items['localNameList'];
                setNames(elements);
            }
        });
        
        chrome.storage.sync.get("localPriceList", function(items) {
            if (items['localPriceList'] != null) {
                elements = items['localPriceList'];
                setPrices(elements);
            }
        });
    }
}
});


chrome.storage.sync.get("localUsername", function(imgsL) {
    if(imgsL['localUsername'] != 'undefined_username') isLogged(imgsL['localUsername']);
});

$(document).ready(function () {
                $("div.tabs").tabs();
                $('#registerButton').on('click', function(){
                    chrome.tabs.create({url: "http://www.google.fr"});
                    return false;
                });
                $('#amazonButton').on('click', function(){
                    chrome.tabs.create({url: "https://www.amazon.fr/"});
                    return false;
                });
                $('#fnacButton').on('click', function(){
                    chrome.tabs.create({url: "http://www.fnac.com/"});
                    return false;
                });
    
                $('#ubaldiButton').on('click', function(){
                    chrome.tabs.create({url: "http://www.ubaldi.com/"});
                    return false;
                });
    
                $('#dartyButton').on('click', function(){
                    chrome.tabs.create({url: "http://www.darty.com/"});
                    return false;
                });
                $('#deconnect').on('click', function(){
                     chrome.storage.sync.set({'localUsername':'undefined_username'}, function() {
                                    console.log('delete username');
                                });
                    $('#tab3').hide();  
                    $('#weeshListsLogged').empty();
                    $('#listOnline').empty();
                    
                    $('#msgSuccessLog').hide();
                    $('#formConnect').show();
                    $('#connectButton').show();
                    $('#registerButton').show();
                    $('#loggedDiv').hide();
                    $('#deconnect').hide();
                    
        
                    return false;
                });
    
    
    
                $('#connectButton').on('click', function(){
                    
                    $.ajax({
                        type: "POST",
                        url: "http://localhost:8888/Weesh/users_rest/login.json",
                        data: {
                            "username":$('#inputLogin').val(),
                            "password":$('#inputPassword').val()
                        },
                        success: function(data){
                            if(data['logged'] == 'true') {
                                chrome.storage.sync.set({'localUsername':$('#inputLogin').val()}, function() {
                                    console.log('saved username');
                                });
                                chrome.storage.sync.set({'localPassword':$('#inputPassword').val()}, function() {});
                                isLogged($('#inputLogin').val());
                            } else {
                                $('#msgErrorLog').show();
                                $('#msgSuccessLog').hide();
                            }
                        },
                        error: function(data){
                            console.log('error login');
                        }
                    });
                });
    
}); 

function setWeeshListes(username){
   
    
        $.ajax({
            type: "GET",
            url: "http:localhost:8888/Weesh/weesh_lists_rest/index/"+username+".json",
            success: function(data){
                chrome.storage.sync.set({'localWeeshListId':data['weesh_lists'][0].id}, function() {});
                 $('#weeshListsLogged').empty();
                $('#listOnline').empty();
                $.each(data['weesh_lists'], function(i, item) {
                    $('#weeshListsLogged').append('<li id="weeshList'+i+'">'+item.name+'</li>');
                });
                $.each(data['weesh_lists'][0]['Item'], function(i, item) {
                    $('#listOnline').append('<li id="elementInWeeshList'+i+'"><img class="imgItem" src="'+item.image+'" alt="" /><span classe="price">'+item.price+'</span><button type="button" class="btn btn-danger deleteOnline">X</button><a href="'+item.url+'">'+item.title+'</a></li>');
                    
                    $('#listOnxline li:last-child').on('click', 'a', function(){
                        chrome.tabs.create({url: $(this).attr('href')});
                        return false;
                    });
                });
            },
            error: function(data){
                console.log('error?');
            }
        });
    }