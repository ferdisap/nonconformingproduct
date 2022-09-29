// identify an element to observe
const elementToObserve = document.querySelector('#content')

// create a new instance of `MutationObserver` named `observer`,
// passing it a callback function
const observer = new MutationObserver(() => {
    console.log('callback that runs when observer is triggered')
})

// call `observe()` on that MutationObserver instance,
// passing it the element to observe, and the options object
observer.observe(elementToObserve, { subtree: true, childList: true })
