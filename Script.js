/*funcion en el evento click*/
document.getElementById("btn_open").addEventListener("click", open_close_menu);
/*variable*/
var side_menu = document.getElementById("menu_side");
var btn_opne = document.getElementById("btn_open");
var body = document.getElementById("body");

//eventos

function open_close_menu() {
    body.classList.toggle("body_move")
    side_menu.classList.toggle("menu__side_move");
}

//variables

const carrito = document.getElementById("carrito"),
    listaPrendas = document.getElementById("lista-prendas"),
    contenedorcarrito = document.querySelector('.buy-card .listas'),
    vaciar = document.querySelector('#vaciar');


let articulosCarrito = [];

registrarEvents()


function registrarEvents() {

    listaPrendas.addEventListener('click', agregarprenda)

    carrito.addEventListener('click', eliminarPrenda)

    vaciar.addEventListener('click',(e) => {
        articulosCarrito = [];
        limpiarHTML()
    })
}

function agregarprenda(e) {

    if (e.target.classList.contains("agregar-prenda")) {

        const prendaSeleccionada = e.target.parentElement.parentElement;
        leerInfo(prendaSeleccionada)
    }

}


function eliminarPrenda(e) {
    if (e.target.classList.contains("borrar-prenda")) {
        const prendaId = e.target.getAttribute('data-id');

        // Encontrar la prenda en el carrito
        const prenda = articulosCarrito.find(prenda => prenda.id === prendaId);

        // Si la cantidad es mayor a 1, restar 1 a la cantidad
        if (prenda.cantidad > 1) {
            prenda.cantidad--;
        } else {
            // Si la cantidad es 1, eliminarla del carrito
            articulosCarrito = articulosCarrito.filter(prenda => prenda.id !== prendaId);
        }

        // Actualizar el HTML del carrito
        carritoHTML();
    }
}

//leer el contenido de nuestro HTML y extraer la info
function leerInfo(prenda) {
    // creando objetos con el contenido del contenedor de prenda
    const infoprenda = {
        imagen: prenda.querySelector('img').src,
        titulo: prenda.querySelector('h3').textContent,
        precio: prenda.querySelector('.precio').textContent,
        id: prenda.querySelector('button').getAttribute('data-id'),
        cantidad: 1
    }

    // revisar  si hay prenda repitente

    const existe = articulosCarrito.some(prenda => prenda.id === infoprenda.id)

    if (existe) {
        const prend = articulosCarrito.map(prenda => {
            if (prenda.id === infoprenda.id) {
                prenda.cantidad++;
                return prenda
            } else {
                return prenda;
            }
        });
        [...articulosCarrito, infoprenda]
    } else {
        articulosCarrito = [...articulosCarrito, infoprenda]
    }
    carritoHTML()
}

function carritoHTML() {
    limpiarHTML()

    articulosCarrito.forEach(prenda => {
        const fila = document.createElement('div');
        fila.innerHTML = `
       <img src= "${prenda.imagen}"></img>
       <p>${prenda.titulo}</p>
       <p>${prenda.precio}</p>
       <p>${prenda.cantidad}</p>
       <p><span class="borrar-prenda" data-id="${prenda.id}">X<span></p>
       `;

        contenedorcarrito.appendChild(fila)
    });
}

//eliminar la lista

function limpiarHTML() {
    while (contenedorcarrito.firstChild) {
        contenedorcarrito.removeChild(contenedorcarrito.firstChild)
    }
}