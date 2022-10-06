// ini diletakkan di DashboardTest, di run pertama kali loading scriptnya
// const evn = new Event('start')

// Listener Even. Ini diletakkan di setiap fungsi yang memerlukan script MyChart atau MyEditor atau lainnya
// document.addEventListener('start', () => {
//     console.log('Start event triggered')
// })

// fire event. Ini diletakkan setiap script yang di loaded, khususnya document.dispatchEvent(evn)
try {
  document.dispatchEvent(evn);
} catch (e) {
  
}
// try {
//     // MyEditor
//     document.dispatchEvent(evn);
// } catch (e) {
//   console.log(e)
//     // try {
//     //     MyChart
//     //     document.dispatchEvent(evn);
//     //     // console.log('MyChart Class')
//     // } catch (e) {}
// }
