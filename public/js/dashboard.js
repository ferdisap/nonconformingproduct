console.log("dashboard script for content is inialization");const dashboard={availableScript:[],dataToFetch:{},responseResult:{dpls:{}},set scriptUrl(url){this.scriptUrl=window.location.origin+url},setData(e){let t=document.querySelector(e).shadowRoot;["input[name]","select[name]"].forEach(e=>{Object.values(t.querySelectorAll(e)).forEach(e=>{let t=e.getAttribute("f-model"),r=e.getAttribute("name");this.dataToFetch[t]?this.dataToFetch[t].includes(e.name)||this.dataToFetch[t].push(r):(this.dataToFetch[t]=[],this.dataToFetch[t].push(r))})})},get fetchData(){return fetch("/dashboard-content",{method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name = "csrf-token"]').getAttribute("content")},body:JSON.stringify(this.dataToFetch)}).then(e=>e.json()).then(e=>{console.log("success",typeof e,e),this.responseResult=e})},async showContent(e){let t=arguments[1]??!1,r=e.split("-").join("");this[r]?new Promise(n=>n(this.renderTemplate(r,e,t))).then(()=>{this.renderChart(e),console.log("render chart success"),this.renderEditor(e),console.log("render editor success")}):new Promise(t=>t(this.xhr(r,e))).then(()=>{this.renderTemplate(r,e,t),this.renderChart(e),console.log("render chart success"),this.renderEditor(e),console.log("render editor success")})},async xhr(e,t){let r=await (await fetch("/view/"+t)).text();this[e]=r},renderTemplate(e,t,r){let n=document.querySelector("#content");n.innerHTML="";let a=document.createElement("div");a.innerHTML=this.createComponent(e,t),n.appendChild(a),r&&this.renderScript(r)},renderEditor(e){let t;try{t=document.querySelectorAll(".myeditor")}catch(r){console.log(r)}this.editor={},t.forEach((t,r)=>{try{let n=new MyEditor.DashboardEditor;return n.setTarget(t.id,e),n.renderEditor,this.editor[r]=n}catch(a){console.log(a)}})},renderChart(e){let t=document.querySelectorAll("canvas[id]");this.chart={chartDump:null},t.forEach((t,r)=>{let n=function e(t){try{return t.querySelector("title").innerHTML}catch(r){}}(t),a=t.querySelector("label-x").innerHTML,i=t.querySelector("label-y").innerHTML;try{let s=new MyChart.DashboardChart;return s.setCtx(t.id,e),s.setLabel(a.split(",")),s.setData(n,i.split(",")),s.renderChart,this.chart[r]=s}catch(o){console.log(o)}})},renderScript(e){if(console.log(e+" is running"),e&&!this.availableScript.includes(e)){let t=document.createElement("script");t.src=window.location.origin+"/js/"+e+".js",document.querySelector("#content").appendChild(t),this.availableScript.push(e)}},createComponent(e,t){let r=document.createElement(t);return this[e]?r.innerHTML=this[e]:r}};