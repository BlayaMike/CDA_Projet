/*const BDD = "./bd/fusion3.json";



async function getData(url){
    let d= [];
    await fetch(url)
    .then(res => res.json())
    .then(data => d=data);
    return d;
}
async function test(){
    
    let dd = await getData(BDD);
    document.querySelector("#A").innerHTML = "<p>"+dd[0].CLIENT[0].NOM_CLI+"</p>";
}

test();
*/