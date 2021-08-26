"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[302,219],{77334:(e,a,n)=>{n.d(a,{Z:()=>l});const l={DOC:{value:[".doc",".docx","application/msword","application/vnd.openxmlformats-officedocument.wordprocessingml.document"],label:"doc"},AUDIO:{value:["audio/*"],label:"audio"},VIDEO:{value:["video/*"],label:"video"},IMAGE:{value:["image/jpeg","image/jpg"],label:"img"},PDF:{value:["application/pdf"],label:"pdf"}}},89219:(e,a,n)=>{n.r(a),n.d(a,{default:()=>i});var l=n(37572),o=n(19501);function t(e,a){for(var n=0;n<a.length;n++){var l=a[n];l.enumerable=l.enumerable||!1,l.configurable=!0,"value"in l&&(l.writable=!0),Object.defineProperty(e,l.key,l)}}var i=function(){function e(a){!function(e,a){if(!(e instanceof a))throw new TypeError("Cannot call a class as a function")}(this,e),this.observations=this.getFormSchema(a)}var a,n,i;return a=e,(n=[{key:"getFormSchema",value:function(e){return e.evaluate?{options:[{label:"Si",value:"aprobado",type:l.Z.RADIO,name:"observacion_".concat(e.name),validations:o.Z_().oneOf(["aprobado","rechazado","sin evaluar"]).required("Debes seleccionar una opción")},{label:"No",value:"rechazado",type:l.Z.RADIO,name:"observacion_".concat(e.name)},{label:"Sin evaluar",value:"sin evaluar",type:l.Z.RADIO,name:"observacion_".concat(e.name)}],comment:{label:"OBSERVACIÓN",value:"",type:l.Z.TEXTAREA,name:"observacion_comentario_".concat(e.name),validationType:"string",validations:o.Z_().when("observacion_".concat(e.name),{is:"rechazado",then:o.Z_().min(5,"Debes ingresar al menos 5 caracteres").max(50,"Puedes ingresar hasta 50 caracteres").required("Debes agregar una observación")})}}:{}}}])&&t(a.prototype,n),i&&t(a,i),e}()},51302:(e,a,n)=>{n.r(a),n.d(a,{getFormSchema:()=>u});var l=n(19501),o=n(89219),t=n(37572),i=n(77334);function r(e){return function(e){if(Array.isArray(e))return s(e)}(e)||function(e){if("undefined"!=typeof Symbol&&null!=e[Symbol.iterator]||null!=e["@@iterator"])return Array.from(e)}(e)||function(e,a){if(!e)return;if("string"==typeof e)return s(e,a);var n=Object.prototype.toString.call(e).slice(8,-1);"Object"===n&&e.constructor&&(n=e.constructor.name);if("Map"===n||"Set"===n)return Array.from(e);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return s(e,a)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function s(e,a){(null==a||a>e.length)&&(a=e.length);for(var n=0,l=new Array(a);n<a;n++)l[n]=e[n];return l}function c(){return(c=Object.assign||function(e){for(var a=1;a<arguments.length;a++){var n=arguments[a];for(var l in n)Object.prototype.hasOwnProperty.call(n,l)&&(e[l]=n[l])}return e}).apply(this,arguments)}function u(e,a,n){var s=c({},e);return[{icon:"M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z",bgColorIcon:"bg-blue-500",bgColorProgress:"bg-blue-300",titleStep:"Datos",bodyStep:[{widthResponsive:"lg:flex-row",body:[{title:"Info",width:"lg:w-full",columns:"grid-cols-1",columnsResponsive:"lg:grid-cols-2",img:"/images/laborales.png",inputs:[{label:"Email",value:s.email,type:t.Z.EMAIL,name:"email",validations:l.Z_().required("Debes completar este campo").email("El formato ingresado no es válido"),observation:new o.default({schema:s,name:"email",evaluate:a}).observations},{label:"Contraseña",value:s.password,type:t.Z.PASSWORD,name:"password",validations:l.Z_().required("Debes completar este campo").min(8,"Debes ingresar al menos 8 caracteres"),observation:new o.default({schema:s,name:"password",evaluate:a}).observations},{label:"Confirmar contraseña",value:s.repeatPassword,type:t.Z.PASSWORD,name:"repeatPassword",validations:l.Z_().required("Debes completar este campo").oneOf([l.iH("password")],"Las contraseñas deben ser iguales"),observation:new o.default({schema:s,name:"repeatPassword",evaluate:a}).observations},{label:"Nombre o razón social",value:s.nombre_razon_social,type:t.Z.TEXT,name:"nombre_razon_social",validations:l.Z_().required("Debes completar este campo"),observation:new o.default({schema:s,name:"nombre_razon_social",evaluate:a}).observations},{label:"Domicilio",value:s.domicilio,type:t.Z.TEXT,name:"domicilio",validations:l.Z_().required("Debes completar este campo"),observation:new o.default({schema:s,name:"domicilio",evaluate:a}).observations},{label:"Nombre de la mina, cantera, explotación y/o establecimiento",value:s.nombre_mina,type:t.Z.TEXT,name:"nombre_mina",validations:l.Z_().required("Debes completar este campo"),observation:new o.default({schema:s,name:"nombre_mina",evaluate:a}).observations},{label:"Certificado de inscripción en AFIP (CUIT)",value:s.cuit,type:t.Z.FILE,name:"cuit",accept:[i.Z.PDF.value],acceptLabel:"Archivos admitidos: ".concat([i.Z.PDF.label].join()),maxSize:"Tamaño maximo por archivo: 10MB",multiple:!1,validations:l.IX().min(1,"Debes adjuntar al menos un elemento").default([]).max(1,"Solo puedes adjuntar hasta 1 archivo").test({name:"CUIT_SIZE",exclusive:!0,message:"Recuerda que cada archivo no debe superar los 10MB",test:function(e){if(!e)return!0;for(var a=!0,n=0;n<e.length;n++){var l=e[n];a=a&&l.size<=1e7}return a}}).test({name:"CUIT_FILE_FORMAT",exclusive:!0,message:"Hay archivos con extensiones no válidas",test:function(e){if(!e)return!0;for(var a=!0,n=0;n<e.length;n++){var l=e[n];a=a&&r(i.Z.PDF.value).includes(l.type)}return a}}),observation:new o.default({schema:s,name:"cuit",evaluate:a}).observations},{label:"Copia escritura del inmueble",helpInfo:"Si la posesión es veinteñal se debe acompañar con el certificado correspondiente",value:s.escritura,type:t.Z.FILE,name:"escritura",accept:[i.Z.PDF.value,i.Z.IMAGE.value],acceptLabel:"Archivos admitidos: ".concat([i.Z.PDF.label,i.Z.IMAGE.label].join()),maxSize:"Tamaño maximo por archivo: 10MB",multiple:!0,validations:l.IX().min(1,"Debes adjuntar al menos un elemento").default([]).max(1,"Solo puedes adjuntar hasta 1 archivo").test({name:"ESCRITURA_FILE_SIZE",exclusive:!0,message:"Recuerda que cada archivo no debe superar los 10MB",test:function(e){if(!e)return!0;for(var a=!0,n=0;n<e.length;n++){var l=e[n];a=a&&l.size<=1e7}return a}}).test({name:"ESCRITURA_FILE_FORMAT",exclusive:!0,message:"Hay archivos con extensiones no válidas",test:function(e){if(!e)return!0;for(var a=!0,n=0;n<e.length;n++){var l=e[n];a=a&&[].concat(r(i.Z.PDF.value),r(i.Z.IMAGE.value)).includes(l.type)}return a}}),observation:new o.default({schema:s,name:"escritura",evaluate:a}).observations}]}]}]},{icon:"M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z",bgColorIcon:"bg-blue-500",bgColorProgress:"bg-blue-300",titleStep:"Datos",bodyStep:[{widthResponsive:"flex-row",body:[{title:"Sustancias minerales que insuatralizan",width:"",columns:"grid-cols-1",columnsResponsive:"",img:"/images/laborales.png",inputs:[{label:"List",type:t.Z.LIST,name:"List",childrens:[[{name:"sustanceSelect",value:null},{name:"mineralSelect",value:null},{name:"dni",value:null}]],elements:[[{label:"Sustancia",value:{},type:t.Z.SELECT,colSpan:"lg:w-2/5",options:[{label:"Sustancias de aprovechamiento común",value:"aprovechamiento_comun"},{label:"Sustancias que se conceden preferentemente al dueño del suelo",value:"conceden_preferentemente"}],name:"sustanceSelect",multiple:!1,closeOnSelect:!0,searchable:!1,inputDepends:["mineralSelect"],optionsDepends:{aprovechamiento_comun:[{label:"Arenas Metalíferas",value:"Arenas Metalíferas"},{label:"Piedras Preciosas",value:"Piedras Preciosas"},{label:"Desmontes",value:"Desmontes"},{label:"Relaves",value:"Relaves"},{label:"Escoriales",value:"Escoriales"}],conceden_preferentemente:[{label:"Salitres",value:"Salitres"},{label:"Salinas",value:"Salinas"},{label:"Turberas",value:"Turberas"},{label:"Metales no comprendidos en 1° Categ.",value:"Metales no comprendidos en 1° Categ."},{label:"Abrasivos",value:"Abrasivos"},{label:"Ocres",value:"Ocres"},{label:"Resinas",value:"Resinas"},{label:"Esteatitas",value:"Esteatitas"},{label:"Baritina",value:"Baritina"},{label:"Caparrosas",value:"Caparrosas"},{label:"Grafito",value:"Grafito"},{label:"Caolí­n",value:"Caolí­n"},{label:"Sales Alcalinas o Alcalino Terrosas",value:"Sales Alcalinas o Alcalino Terrosas"},{label:"Amianto",value:"Amianto"},{label:"Bentonita",value:"Bentonita"},{label:"Zeolitas o Minerales Permutantes o Permutíticos",value:"Zeolitas o Minerales Permutantes o Permutíticos"}]},placeholder:"Selecciona una opción"},{label:"Mineral Explotado",value:{},type:t.Z.SELECT,colSpan:"lg:w-2/5",options:[],name:"mineralSelect",inputDepends:[],multiple:!1,closeOnSelect:!0,searchable:!1,placeholder:"Selecciona una opción"},{label:"DNI",value:s.dni,type:t.Z.NUMBER,colSpan:"lg:w-1/5",name:"dni2"},{colSpan:"lg:w-5/5",observation:new o.default({schema:s,name:"row-",evaluate:a}).observations}]],validations:l.IX().of(l.Ry().shape({sustanceSelect:l.Ry().when("sustance",{is:function(e){return _.isEmpty(e)},then:l.Ry().required("Debes elegir un elemento").nullable()}),mineralSelect:l.Ry().when("mineral",{is:function(e){return _.isEmpty(e)},then:l.Ry().required("Debes elegir un elemento").nullable()}),dni2:l.Z_().required("Debes ingresar un dni")})).strict()}]}]}]},{icon:"M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z",bgColorIcon:"bg-blue-500",bgColorProgress:"bg-blue-300",titleStep:"Datos",bodyStep:[{widthResponsive:"lg:flex-row",body:[{title:"Ubicación",width:"lg:w-full",columns:"grid-cols-1",columnsResponsive:"lg:grid-cols-2",img:"/images/laborales.png",inputs:[{label:"Provincia",value:{},type:t.Z.SELECT,async:!0,asyncUrl:"/paises/departamentos",inputDepends:["departamento"],inputClearDepends:["departamento","localidad"],options:n.provincia,name:"provincia",multiple:!1,closeOnSelect:!0,searchable:!1,placeholder:"Selecciona una opción",validations:l.Ry().when("provinciaSelect",{is:function(e){return _.isEmpty(e)||!e},then:l.Ry().required("Debes elegir un elemento").nullable()}),observation:new o.default({schema:s,name:"provincia",evaluate:a}).observations},{label:"Departamento",value:{},type:t.Z.SELECT,async:!0,asyncUrl:"/paises/localidades",inputDepends:["localidad"],inputClearDepends:["localidad"],isLoading:!1,options:[],name:"departamento",multiple:!1,closeOnSelect:!0,searchable:!1,placeholder:"Selecciona una opción",validations:l.Ry().when("departamentoSelect",{is:function(e){return _.isEmpty(e)||!e},then:l.Ry().required("Debes elegir un elemento").nullable()}),observation:new o.default({schema:s,name:"departamento",evaluate:a}).observations},{label:"Localidad",value:{},type:t.Z.SELECT,async:!0,isLoading:!1,options:[],name:"localidad",multiple:!1,closeOnSelect:!0,searchable:!1,placeholder:"Selecciona una opción",validations:l.Ry().when("localidadSelect",{is:function(e){return _.isEmpty(e)||!e},then:l.Ry().required("Debes elegir un elemento").nullable()}),observation:new o.default({schema:s,name:"localidad",evaluate:a}).observations}]}]}]}]}}}]);