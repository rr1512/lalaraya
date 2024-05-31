import{w as M,bI as B,r as o,bp as F,f as W,e as R,j as a,c as z,B as P,X as c,A as V,m as T,o as k,cW as q,T as L,L as G}from"./main-eb4aecd5.js";import{T as X}from"./TaskAlt-3a0c453e.js";var A="https://js.stripe.com/v3",U=/^https:\/\/js\.stripe\.com\/v3\/?(\?.*)?$/,N="loadStripe.setLoadParameters was called but an existing Stripe.js script already exists in the document; existing script parameters will be used",O=function(){for(var e=document.querySelectorAll('script[src^="'.concat(A,'"]')),t=0;t<e.length;t++){var n=e[t];if(U.test(n.src))return n}return null},I=function(e){var t=e&&!e.advancedFraudSignals?"?advancedFraudSignals=false":"",n=document.createElement("script");n.src="".concat(A).concat(t);var s=document.head||document.body;if(!s)throw new Error("Expected document.body not to be null. Stripe.js requires a <body> element.");return s.appendChild(n),n},H=function(e,t){!e||!e._registerWrapper||e._registerWrapper({name:"stripe-js",version:"2.2.2",startTime:t})},x=null,g=null,w=null,J=function(e){return function(){e(new Error("Failed to load Stripe.js"))}},K=function(e,t){return function(){window.Stripe?e(window.Stripe):t(new Error("Stripe.js not available"))}},Q=function(e){return x!==null?x:(x=new Promise(function(t,n){if(typeof window>"u"||typeof document>"u"){t(null);return}if(window.Stripe&&e&&console.warn(N),window.Stripe){t(window.Stripe);return}try{var s=O();if(s&&e)console.warn(N);else if(!s)s=I(e);else if(s&&w!==null&&g!==null){var i;s.removeEventListener("load",w),s.removeEventListener("error",g),(i=s.parentNode)===null||i===void 0||i.removeChild(s),s=I(e)}w=K(t,n),g=J(n),s.addEventListener("load",w),s.addEventListener("error",g)}catch(l){n(l);return}}),x.catch(function(t){return x=null,Promise.reject(t)}))},Y=function(e,t,n){if(e===null)return null;var s=e.apply(void 0,t);return H(s,n),s},_=Promise.resolve().then(function(){return Q(null)}),C=!1;_.catch(function(r){C||console.warn(r)});var Z=function(){for(var e=arguments.length,t=new Array(e),n=0;n<e;n++)t[n]=arguments[n];C=!0;var s=Date.now();return _.then(function(i){return Y(i,t,s)})};function $({type:r,productId:e,priceId:t}){const{user:n}=M(),s=B(),i=o.useRef(!1),l=o.useRef(null),{localeCode:S}=F(),[d,h]=o.useState(null),[E,b]=o.useState(null),{branding:{site_name:m},billing:{stripe_public_key:u,stripe:{enable:p}}}=W();return o.useEffect(()=>{!p||!u||i.current||(Promise.all([Z(u,{apiVersion:"2022-08-01",locale:S}),r==="setupIntent"?ee():te(e,t)]).then(([f,{clientSecret:j}])=>{if(f&&l.current){const v=f.elements({clientSecret:j,appearance:{theme:s?"night":"stripe"}});v.create("payment",{business:{name:m},terms:{card:"never"},fields:{billingDetails:{address:"auto"}},defaultValues:{billingDetails:{email:n==null?void 0:n.email}}}).mount(l.current),h(f),b(v)}}),i.current=!0)},[e,u,p,s,S,m,r,n==null?void 0:n.email]),{stripe:d,elements:E,paymentElementRef:l,stripeIsEnabled:u!=null&&p}}function ee(){return R.post("billing/stripe/create-setup-intent").then(r=>r.data)}function te(r,e){return R.post("billing/stripe/create-partial-subscription",{product_id:r,price_id:e}).then(t=>t.data)}function ie({productId:r,priceId:e,type:t="subscription",submitLabel:n,returnUrl:s}){const{stripe:i,elements:l,paymentElementRef:S,stripeIsEnabled:d}=$({type:t,productId:r,priceId:e}),[h,E]=o.useState(null),[b,m]=o.useState(!1),u=!d||l!=null&&i!=null,p=async f=>{var j,v;if(f.preventDefault(),!(!i||!l)){m(!0);try{const y=await i[t==="subscription"?"confirmPayment":"confirmSetup"]({elements:l,confirmParams:{return_url:s}});((j=y.error)==null?void 0:j.type)!=="validation_error"&&((v=y.error)!=null&&v.message)&&E(y.error.message)}catch{}m(!1)}};return a.jsxs("form",{onSubmit:p,children:[a.jsx("div",{ref:S,className:z("min-h-[303px]",!d&&"hidden"),children:d&&a.jsx(ne,{})}),h&&!b&&a.jsx("div",{className:"mt-20 text-danger",children:h}),a.jsx(P,{variant:"flat",color:"primary",size:"md",className:"mt-40 w-full",type:"submit",disabled:b||!u,children:n})]})}function ne(){return a.jsxs(o.Fragment,{children:[a.jsx(c,{className:"mb-20 h-30"}),a.jsx(c,{className:"mb-20 h-30"}),a.jsx(c,{className:"mb-20 h-30"}),a.jsx(c,{className:"h-30"})]})}function le({config:r}){return a.jsx(V,{initial:!1,mode:"wait",children:a.jsx("div",{className:"mt-80",children:r?a.jsxs(T.div,{className:"text-center",...k,children:[r.status==="success"?a.jsx(X,{className:"text-positive text-6xl"}):a.jsx(q,{className:"text-danger text-6xl"}),a.jsx("div",{className:"text-2xl font-semibold mt-30",children:a.jsx(L,{...r.message})}),a.jsx(P,{variant:"flat",color:"primary",className:"w-full mt-30",size:"md",elementType:G,to:r.link,children:a.jsx(L,{...r.buttonLabel})})]},"payment-status"):a.jsx(re,{},"loading-skeleton")})})}function re(){return a.jsxs(T.div,{className:"text-center max-w-280",...k,children:[a.jsx(c,{size:"w-50 h-50",variant:"rect"}),a.jsx(c,{className:"text-2xl mt-30"}),a.jsx(c,{size:"h-42",className:"mt-30"})]},"loading-skeleton")}export{le as B,ie as S,Z as l};
//# sourceMappingURL=billing-redirect-message-2d33352d.js.map