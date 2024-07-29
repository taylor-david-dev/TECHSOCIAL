$("#user_name").keyup(function () {
    $.ajax({
        crossDomain: true,
        type: "POST",
        url: "../user/doPesquisaAjax",
        data: {name: $("#user_name").val()},
        cache: false,
        success: function (data) {
            $('#result_user').html(data);
        }
    });
});
$('#datetimepicker_mask').datetimepicker({
    mask: '99/19/9999'
});
$('.adatetimepicker_mask').datetimepicker({
    mask: '99/19/9999 29:59'
});

var lista_genero = "";

function pegaValorTRUserAjax(linha) {

    $(linha).each(function () {
        $('#user_id').val($(this.cells[0]).text());
        $('#user_id_1').val($(this.cells[1]).text());
    });
    
    $('#user_id').val();
    
    $('#myModal').modal('toggle');
    //alert($(this).find('td').eq(1).html())
}

function excluir_genero(linha) {
    if(confirm("Deseja realmente excluir?!")){
        $("#excluir_"+linha).remove();
    }
}

// JavaScript Document
function onlynumbers(e) {
    if (window.event) {
        key = e.keyCode;
    } else if (e.which) {
        key = e.which;
    }
    if (key != 8 || key < 48 || key > 57)
        return (((key > 47) && (key < 58)) || (key == 8));
    {
        return true;
    }
}

function clearDefault(el) {
    if (el.defaultValue == el.value)
        el.value = ""
}

String.prototype.formatCurrency = formatamoney

function formatCurrency(number) {
    var num = new String(number);
    if (num.indexOf(".") == -1) {
        intLen = num.length;
        toEnd = intLen;
        var strLeft = new String(num.substring(0, toEnd));
        var strRight = new String("00");
    } else {
        pos = eval(num.indexOf("."));
        var strLeft = new String(num.substring(0, pos));
        intToEnd = num.length;
        intThing = pos + 1;
        var strRight = new String(num.substring(intThing, intToEnd));
        if (strRight.length > 2) {
            nextInt = strRight.charAt(2);
            if (nextInt >= 5) {
                strRight = new String(strRight.substring(0, 2));
                strRight = new String(eval((strRight * 1) + 1));
                if ((strRight * 1) >= 100) {
                    strRight = "00";
                    strLeft = new String(eval((strLeft * 1) + 1));
                }
                if (strRight.length <= 1) {
                    strRight = new String("0" + strRight);
                }
            } else {
                strRight = new String(strRight.substring(0, 2));
            }
        } else {
            if (strRight.length != 2) {
                strRight = strRight + "0";
            }
        }
    }
    if (strLeft.length > 3 && strLeft.length < 13) {
        var curPos = (strLeft.length - 3);
        while (curPos > 0) {
            var remainingLeft = new String(strLeft.substring(0, curPos));
            var strLeftLeft = new String(strLeft.substring(0, curPos));
            var strLeftRight = new String(strLeft.substring(curPos, strLeft.length));
            strLeft = new String(strLeftLeft + "." + strLeftRight);
            curPos = (remainingLeft.length - 3);
        }
    }
    strWhole = strLeft + "," + strRight;
    finalValue = 'R$ ' + strWhole;
    return (finalValue);
}

function formatCurrency2(number) {
    var num = new String(number);
    if (num.indexOf(".") == -1) {
        intLen = num.length;
        toEnd = intLen;
        var strLeft = new String(num.substring(0, toEnd));
        var strRight = new String("00");
    } else {
        pos = eval(num.indexOf("."));
        var strLeft = new String(num.substring(0, pos));
        intToEnd = num.length;
        intThing = pos + 1;
        var strRight = new String(num.substring(intThing, intToEnd));
        if (strRight.length > 2) {
            nextInt = strRight.charAt(2);
            if (nextInt >= 5) {
                strRight = new String(strRight.substring(0, 2));
                strRight = new String(eval((strRight * 1) + 1));
                if ((strRight * 1) >= 100) {
                    strRight = "00";
                    strLeft = new String(eval((strLeft * 1) + 1));
                }
                if (strRight.length <= 1) {
                    strRight = new String("0" + strRight);
                }
            } else {
                strRight = new String(strRight.substring(0, 2));
            }
        } else {
            if (strRight.length != 2) {
                strRight = strRight + "0";
            }
        }
    }
    if (strLeft.length > 3 && strLeft.length < 13) {
        var curPos = (strLeft.length - 3);
        while (curPos > 0) {
            var remainingLeft = new String(strLeft.substring(0, curPos));
            var strLeftLeft = new String(strLeft.substring(0, curPos));
            var strLeftRight = new String(strLeft.substring(curPos, strLeft.length));
            strLeft = new String(strLeftLeft + "." + strLeftRight);
            curPos = (remainingLeft.length - 3);
        }
    }
    strWhole = strLeft + "," + strRight;
    return (strWhole);
}

documentall = document.all;

function formatamoney(c) {
    var t = this;
    if (c == undefined)
        c = 2;
    var p, d = (t = t.split("."))[1].substr(0, c);
    for (p = (t = t[0]).length; (p -= 3) >= 1; ) {
        t = t.substr(0, p) + "." + t.substr(p);
    }
    return t + "," + d + Array(c + 1 - d.length).join(0);
}



function demaskvalue(valor, currency) {
    var val2 = '';
    var strCheck = '0123456789';
    var len = valor.length;
    if (len == 0) {
        return 0.00;
    }

    if (currency == true) {
        for (var i = 0; i < len; i++)
            if ((valor.charAt(i) != '0') && (valor.charAt(i) != ','))
                break;

        for (; i < len; i++) {
            if (strCheck.indexOf(valor.charAt(i)) != -1)
                val2 += valor.charAt(i);
        }

        if (val2.length == 0)
            return "0.00";
        if (val2.length == 1)
            return "0.0" + val2;
        if (val2.length == 2)
            return "0." + val2;

        var parte1 = val2.substring(0, val2.length - 2);
        var parte2 = val2.substring(val2.length - 2);
        var returnvalue = parte1 + "." + parte2;
        return returnvalue;
    } else {
        val3 = "";
        for (var k = 0; k < len; k++) {
            if (strCheck.indexOf(valor.charAt(k)) != -1)
                val3 += valor.charAt(k);
        }
        return val3;
    }
}

function reais(obj, event) {
//	var whichCode = (window.Event) ? event.which : event.keyCode;
    var whichCode = (window.addEventListener) ? event.which : event.keyCode;

    if (whichCode == 8 && !documentall) {
        if (event.preventDefault) { //standart browsers
            event.preventDefault();
        } else { // internet explorer
            event.returnValue = false;
        }
        var valor = obj.value;
        var x = valor.substring(0, valor.length - 1);
        obj.value = demaskvalue(x, true).formatCurrency();
        return false;
    }
    FormataReais(obj, '.', ',', event);
}

function backspace(obj, event) {
//	var whichCode = (window.Event) ? event.which : event.keyCode;
    var whichCode = (window.addEventListener) ? event.which : event.keyCode;
    if (whichCode == 8 && documentall) {
        var valor = obj.value;
        var x = valor.substring(0, valor.length - 1);
        var y = demaskvalue(x, true).formatCurrency();

        obj.value = "";
        obj.value += y;

        if (event.preventDefault) {
            event.preventDefault();
        } else {
            event.returnValue = false;
        }
        return false;

    }
}

function FormataReais(fld, milSep, decSep, e) {
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
//	var whichCode = (window.Event) ? e.which : e.keyCode;
    var whichCode = (window.addEventListener) ? e.which : e.keyCode;

    if (whichCode == 0)
        return true;
    if (whichCode == 9)
        return true; //tecla tab
    if (whichCode == 13)
        return true; //tecla enter
    if (whichCode == 16)
        return true; //shift internet explorer
    if (whichCode == 17)
        return true; //control no internet explorer
    if (whichCode == 27)
        return true; //tecla esc
    if (whichCode == 34)
        return true; //tecla end
    if (whichCode == 35)
        return true;//tecla end
    if (whichCode == 36)
        return true; //tecla home

    if (e.preventDefault) {
        e.preventDefault()
    } else {
        e.returnValue = false
    }

    var key = String.fromCharCode(whichCode);
    if (strCheck.indexOf(key) == -1)
        return false;

    fld.value += key;

    var len = fld.value.length;
    var bodeaux = demaskvalue(fld.value, true).formatCurrency();
    fld.value = bodeaux;

    if (fld.createTextRange) {
        var range = fld.createTextRange();
        range.collapse(false);
        range.select();
    } else if (fld.setSelectionRange) {
        fld.focus();
        var length = fld.value.length;
        fld.setSelectionRange(length, length);
    }
    return false;
}

function tamanhoTeste(obj, event) {
    var v = obj.value;
    if (v.length < 12) {
        reais(obj, event);
    }
}

// somente números
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

// números e vírgula
function isNumberKey2(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        if (charCode != 46) {
            return false;
        }
    }
    return true;
}

// barras do campo data
function mascaraData(obj, evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;

    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }

    if (obj.value.length == 2 || obj.value.length == 5) {
        obj.value = obj.value + "/";
    }

    return true;
}

YUI().use('node', 'crop-box', function (Y) {
    var options =
            {
                imageBox: '.imageBox',
                thumbBox: '.thumbBox',
                spinner: '.spinner',
                imgSrc: ''
            }
    var cropper = new Y.cropbox(options);
    Y.one('#file').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            options.imgSrc = e.target.result;
            cropper = new Y.cropbox(options);
        }
        reader.readAsDataURL(this.get('files')._nodes[0]);
        this.get('files')._nodes = [];
    })
    Y.one('#btnCrop').on('click', function () {
        var img = cropper.getDataURL()
        Y.one('.cropped').append('<img src="' + img + '">');
        $('#file_new').val(img);
    })
    Y.one('#btnZoomIn').on('click', function () {
        cropper.zoomIn();
    })
    Y.one('#btnZoomOut').on('click', function () {
        cropper.zoomOut();
    })
})