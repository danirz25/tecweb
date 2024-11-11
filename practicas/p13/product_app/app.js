// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
};

$(document).ready(function(){ 
    let edit = false;

    let JsonString = JSON.stringify(baseJSON,null,2);
    $('#description').val(JsonString);
    $('#product-result').hide();
    listarProductos();

    function listarProductos() {
        $.ajax({
            url: './backend/product-list.php',
            type: 'GET',
            success: function(response) {
                const productos = JSON.parse(response);
                if(Object.keys(productos).length > 0) {
                    let template = '';

                    productos.forEach(producto => {
                        // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                        let descripcion = '';
                        descripcion += '<li>precio: '+producto.precio+'</li>';
                        descripcion += '<li>unidades: '+producto.unidades+'</li>';
                        descripcion += '<li>modelo: '+producto.modelo+'</li>';
                        descripcion += '<li>marca: '+producto.marca+'</li>';
                        descripcion += '<li>detalles: '+producto.detalles+'</li>';
                    
                        template += `
                            <tr productId="${producto.id}">
                                <td>${producto.id}</td>
                                <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                <td><ul>${descripcion}</ul></td>
                                <td>
                                    <button class="product-delete btn btn-danger"">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    $('#products').html(template);
                }
            }
        });
    }

    $('#search').keyup(function() {
        if($('#search').val()) {
            let search = $('#search').val();
            $.ajax({
                url: './backend/product-search.php?search='+$('#search').val(),
                data: {search},
                type: 'GET',
                success: function (response) {
                    if(!response.error) {
                        const productos = JSON.parse(response);
                        if(Object.keys(productos).length > 0) {
                            let template = '';
                            let template_bar = '';

                            productos.forEach(producto => {
                                let descripcion = '';
                                descripcion += '<li>precio: '+producto.precio+'</li>';
                                descripcion += '<li>unidades: '+producto.unidades+'</li>';
                                descripcion += '<li>modelo: '+producto.modelo+'</li>';
                                descripcion += '<li>marca: '+producto.marca+'</li>';
                                descripcion += '<li>detalles: '+producto.detalles+'</li>';
                                template += `
                                    <tr productId="${producto.id}">
                                        <td>${producto.id}</td>
                                        <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                        <td><ul>${descripcion}</ul></td>
                                        <td>
                                            <button class="product-delete btn btn-danger">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                `;
                                template_bar += `
                                    <li>${producto.nombre}</il>
                                `;
                            });
                            $('#product-result').show();
                            $('#container').html(template_bar);
                            $('#products').html(template);    
                        }
                    }
                }
            });
        }
        else {
            $('#product-result').hide();
            listarProductos();
        }
    });

    $('#product-form').submit(e => {
        e.preventDefault();

        // SE Declara el Json
        let finalJSON = {
            "id": $('#productId').val(),
            "nombre": $('#name').val(),
            "precio": $('#precio').val(),
            "unidades": $('#unidades').val(),
            "modelo": $('#modelo').val(),
            "marca": $('#marca').val(),
            "detalles": $('#detalles').val(),
            "imagen": $('#imagen').val()
        };

        if(finalJSON.unidades == ""){
            $('#unidades').val(0.0);
            finalJSON.unidades = 0.0;
        }
    
        let noValido = false;
        if(nombre(finalJSON.nombre, edit)){ 
            $('#name').addClass('is-invalid');
            noValido = true;
        }

        if(precio(finalJSON.precio)){ 
            $('#precio').addClass('is-invalid');
            noValido = true;
        }

        if(unidades(finalJSON.unidades)){
            $('#unidades').addClass('is-invalid');
            noValido = true;
        }

        if(modelo(finalJSON.modelo)){
            $('#modelo').addClass('is-invalid');
            noValido = true;
        }

        if(marca(finalJSON.marca)){
            $('#marca').addClass('is-invalid');
            noValido = true;
        }

        if(detalles(finalJSON.detalles)){
            $('#detalles').addClass('is-invalid');
            noValido = true;
        }

        if(noValido){ 
            return;
        }

        if(finalJSON.imagen == ""){ 
            finalJSON.imagen = "img/default.png";
        }

        const url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
        
        $.post(url, finalJSON, (response) => {
            let respuesta = JSON.parse(response);
            let template_bar = '';
            template_bar += `
                        <li style="list-style: none;">status: ${respuesta.status}</li>
                        <li style="list-style: none;">message: ${respuesta.message}</li>
                    `;
            //Form reiniciado
            $('#name').val('');
            $('#precio').val('');
            $('#unidades').val('');
            $('#modelo').val('');
            $('#marca').val('');
            $('#detalles').val('');
            $('#imagen').val('');
            $('#productId').val('');
            $('#product-result').show();
            $('#container').html(template_bar);
            listarProductos();
            edit = false;
        });
    });

    $(document).on('click', '.product-delete', (e) => {
        if(confirm('¿Realmente deseas eliminar el producto?')) {
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr('productId');
            $.post('./backend/product-delete.php', {id}, (response) => {
                $('#product-result').hide();
                listarProductos();

                let respuesta = JSON.parse(response);
                console.log(respuesta.message);
            });
        }
    });

    $(document).on('click', '.product-item', (e) => {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('productId');
        $.post('./backend/product-single.php', {id}, (response) => {
          
            let product = JSON.parse(response);
            $('#name').val(product.nombre);
            $('#productId').val(product.id);
            $('#precio').val(product.precio);
            $('#unidades').val(product.unidades);
            $('#modelo').val(product.modelo);
            $('#marca').val(product.marca);
            $('#detalles').val(product.detalles);
            $('#imagen').val(product.imagen);
            edit = true;
        });
        e.preventDefault();
    });    


    $('#name').on('blur', function() { 
        let nombreInput = $(this).val();
        nombre(nombreInput, edit); 
    });


    $('#marca').on('blur', function() {
        let marcaInput = $(this).val();
        if (marca(marcaInput)) {
            $(this).addClass('is-invalid');
            $(this).removeClass('is-valid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });


    $('#modelo').on('blur', function() {
        let modeloInput = $(this).val();
        if (modelo(modeloInput)) {
            $(this).addClass('is-invalid');
            $(this).removeClass('is-valid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });

    $('#precio').on('blur', function() {
        let precioInput = $(this).val();
        if (precio(precioInput)) {
            $(this).addClass('is-invalid');
            $(this).removeClass('is-valid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });

    $('#detalles').on('blur', function() {
        let detallesInput = $(this).val();
        if (detalles(detallesInput)) {
            $(this).addClass('is-invalid');
            $(this).removeClass('is-valid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });

    $('#unidades').on('blur', function() {
        let unidadesInput = $(this).val();
        if (unidades(unidadesInput)) {
            $(this).addClass('is-invalid');
            $(this).removeClass('is-valid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });

});

function nombre(nom,edit){
    let noValido = false;
    let errorLongitud = false;
    if(nom.length > 100 || nom.length==0){

        console.log("Error en la longitud nombre");
        $('#ErrorNombre').text("Nombre no valido, debe tener de 1 a 100 caracteres");
        noValido = true;
        errorLongitud = true;
    }

    let producto = {
        "nombre":$('#name').val()
    };
    if(edit){
        if(noValido){
            $('#name').addClass('is-invalid');
            $('#name').removeClass('is-valid');
        }else{
            $('#name').removeClass('is-invalid');
            $('#name').addClass('is-valid');
        }
        return noValido;
    }
    $.post('./backend/product-singleSearch.php', producto, (response) => {
        let respuesta = JSON.parse(response);

        if(respuesta.status == "error" && edit == false){
            console.log("Error: El nombre del producto ya existe");

                $('#ErrorNombre').text("El nombre del producto ya existe");
            
            noValido = true;
        }

        if(noValido){
            $('#name').addClass('is-invalid');
            $('#name').removeClass('is-valid');
        }else{
            $('#name').removeClass('is-invalid');
            $('#name').addClass('is-valid');
        }
    })

    return noValido;
}

function marca(mar){        //Marcas del formulario
    let marcas = {
        "Hasbro":1,
        "Mattel":2,
        "Mi alegria":3,
        "Lego":4,
        "Patito":5,
    };
    if(marcas[mar] == undefined){
        console.log("Error en la marca");
        return true;
    }else{
        return false;
    }
}

function modelo(model){
    let regex = /^[a-zA-Z0-9]{1,25}$/; // Expresión regular
    if(model.length > 25 || regex.test(model) == false){
        console.log("Error en el modelo");
        return true;
    }else{
        return false;
    }
}

function precio(precio){
    if(Number(precio) < 99.99){
        console.log("Error en el precio");
        return true;
    }else{
        return false;
    }
}

function detalles(detalles){
    if(detalles!= ""){
        if(detalles.length > 255){
            console.log("Error en los detalles");
            return true;
        }
    }
    return false;
}

function unidades(unidades){
    if(Number(unidades) < 0){
        console.log("Error en el numero de unidades");
        return true;
    }else{
        return false;
    }
}