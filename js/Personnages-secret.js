var code = "";
const codeBouton = [
    ['artrish','1'],
    ['yinva', '2'],
    ['shizari', '3'],
    ['guizamark', '4'],
    ['pestia', '5'],
    ['chronos', '6'],
    ['aqua', '7'],
    ['goliath', '8'],
    ['drii', '9'],
    ['lada', '10'],
    ['pura', '11']
]

for(let ii = 0; ii < codeBouton.length; ii++){
    document.getElementById(codeBouton[ii][0]).addEventListener('change', function(){
        code += codeBouton[ii][1];

        if(code == '1234567891011' || code == '1243567891011'){
            window.location.href='AXEXQ824.php';
        }
    })
}

document.getElementById('aucun').addEventListener('change', function(){
    code = "";
});
