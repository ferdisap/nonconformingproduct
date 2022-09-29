// export function test() {
//   alert('tes JS');
//   console.log('test JS');
//   // var test = 'test JS';
// }

// console.log('test JS');
// alert('tes JS');
// const testObj = {
//   nama: 'ferdi',
// }
// export function test(){
//   return 'this is test() function imported';
// }
// export function DPLQuantity(title){
//   this.title = title;
//   // setQuantity = function(number){
//   //   this.quantity = number;
//   // }
// }

class Orang {
  kewarganegaraan = 'INDONESIA';
  constructor(nama, umur){
    this.nama = nama;
    this.umur = umur;
  }
  setNama(string){
    if (! string){
      return false;
    }
    this.nama = string;
    return this.nama;
  }
  // set umur(umur){
  //   this.umur = umur;
  // }
}