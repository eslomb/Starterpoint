(globalThis.itsecWebpackJsonP=globalThis.itsecWebpackJsonP||[]).push([[7063],{3947:(e,t,s)=>{"use strict";s.r(t);var i=s(6293),n=s(3571),r=s(95122),o=s(48015),c=s(78930),a=s(31600);const l=[{slug:"inactive-users",priority:1,label:(0,r.__)("Inactive Users","better-wp-security"),description:(0,r.__)("Scan for inactive users registered on your site","better-wp-security"),index:20},{slug:"old-site-scan",priority:2,label:(0,r.__)("Rogue Installs","better-wp-security"),description:(0,r.__)("Check for sites that are no longer in use.","better-wp-security")}];function p(){const{installType:e}=(0,o.useSelect)((e=>({installType:e(a.coreStore).getInstallType()})),[]);return(0,i.createElement)(c.ProgressBarBeforeFill,null,"free"===e&&l.map((e=>(0,i.createElement)(c.ScanComponentPromo,{key:e.slug,index:e.index,label:e.label,description:e.description}))))}s.p=window.itsecWebpackPublicPath,(0,r.setLocaleData)({"":{}},"ithemes-security-pro"),(0,n.registerPlugin)("itsec-promos-site-scan",{render:()=>(0,i.createElement)(p,null)})},31600:e=>{e.exports=function(){return this.itsec.packages.data}()},78930:e=>{e.exports=function(){return this.itsec.pages["site-scan"]}()},48015:e=>{e.exports=function(){return this.wp.data}()},6293:e=>{e.exports=function(){return this.wp.element}()},95122:e=>{e.exports=function(){return this.wp.i18n}()},3571:e=>{e.exports=function(){return this.wp.plugins}()}},e=>{var t=(3947,e(e.s=3947));((window.itsec=window.itsec||{}).promos=window.itsec.promos||{})["site-scan"]=t}]);