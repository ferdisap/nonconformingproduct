// import '../css/app.css'

var dashboard = {}
console.log('test')

function myContent (componentName) {
    var content = document.querySelector('#content')
    content.innerHTML = ''

    var name = componentName.split('-') // output = array
    name = name.join('') // output = string for object dashboard key
    dashboard[name]
        ? renderTemplate(name, componentName)
        : xhr(name, componentName)
}

async function xhr (name, componentName) {
    let getUrl = await fetch('/view/' + componentName)
    let result = await getUrl.text()
    dashboard[name] = result
    await renderTemplate(name, componentName)
}

function htmlToElement (html, id) {
    var template = document.createElement('template')
    // html = html.trim(); // Never return a text node of whitespace as the result
    template.id = id
    template.innerHTML = html
    return template
}

function renderTemplate (name, componentName) {
    try {
        newElement(name, componentName)
    } catch (e) {
        var el = document.createElement(componentName)
        return window.content.appendChild(el)
    }
    var el = document.createElement(componentName)
    return window.content.appendChild(el)
}

function newElement (name, componentName) {
    return customElements.define(
        componentName,
        class extends HTMLElement {
            constructor () {
                super()

                let template = htmlToElement(dashboard[name], componentName)
                let templateContent = template.content

                const shadowRoot = this.attachShadow({
                    mode: 'open'
                })
                shadowRoot.appendChild(templateContent.cloneNode(true))

                let style = document.createElement('style');
                style.textContent = `
                  .dump {
                    border: 2px solid green
                  }`;
                shadowRoot.appendChild(style)
            }
        }
    )
}
