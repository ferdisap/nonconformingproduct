export class Contoh {
  constructor(){
    console.log('Contoh class')
    var var1 = "ini var scope";
    let let1 = "ini let scope";
  }
  print(str){
    console.log(str);
  }
}

window.contoh = new Contoh();
console.log("ini adalah contoh class: "+contoh);