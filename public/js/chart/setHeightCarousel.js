// console.log('set Heigh carousel is started')
// let canvasParent = document.querySelector('canvas').parentElement
// let item_carousel_problem_log_qty = document.querySelectorAll(
//     '#carousel-problem_log-qty .carousel-item > div'
// )
// let item_carousel_problem_log_modus_monthly = document.querySelectorAll(
//     '#carousel-problem_log-modus-monthly .carousel-item > div'
// )
// let item_carousel_problem_log_modus_quarterly = document.querySelectorAll(
//     '#carousel-problem_log-modus-quarterly .carousel-item > div'
// )
// let cls = 

// window.addEventListener('resize', event => {


//     item_carousel_problem_log_qty.forEach(function (el) {
//         el.style.height = canvasParent.offsetHeight + 'px'
//         // el.style.height = "calc(var(--height-carousel) + 100px)"
//     })
//     item_carousel_problem_log_modus_monthly.forEach(function (el) {
//         el.style.height = canvasParent.offsetHeight / 2 - 12 + 'px' // 12 dikarenakan di tag htmlnya pakai --bs-gap:2rem
//         // el.style.height = "calc(var(--height-carousel) + 100px)" // 12 dikarenakan di tag htmlnya pakai --bs-gap:2rem
//     })
//     item_carousel_problem_log_modus_quarterly.forEach(function (el) {
//         el.style.height = canvasParent.offsetHeight / 2 - 12 + 'px'
//         // el.style.height = "calc(var(--height-carousel) + 100px)"
//     })
//     console.log('test')
// })

// // event 'chart-started' di instantiate di method renderChart, class DashboardTest
// if (window.chartEvent) {
//     item_carousel_problem_log_qty.forEach(function (el) {
//         el.style.height = canvasParent.offsetHeight + 'px'
//         // el.style.height = "calc(var(--height-carousel) + 100px)"
//     })
//     item_carousel_problem_log_modus_monthly.forEach(function (el) {
//         el.style.height = canvasParent.offsetHeight / 2 - 12 + 'px'
//     })
//     item_carousel_problem_log_modus_quarterly.forEach(function (el) {
//         el.style.height = canvasParent.offsetHeight / 2 - 12 + 'px'
//     })
//     window.chartEvent = false
// } else {
//     document.addEventListener('chart-started', function () {
//         item_carousel_problem_log_qty.forEach(function (el) {
//             el.style.height = canvasParent.offsetHeight + 'px'
//             // el.style.height = "calc(var(--height-carousel) + 100px)"
//         })
//         item_carousel_problem_log_modus_monthly.forEach(function (el) {
//             el.style.height = canvasParent.offsetHeight / 2 - 12 + 'px'
//         })
//         item_carousel_problem_log_modus_quarterly.forEach(function (el) {
//             el.style.height = canvasParent.offsetHeight / 2 - 12 + 'px'
//         })
//     })
// }
