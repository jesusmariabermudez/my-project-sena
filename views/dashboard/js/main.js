        //limitar numero de caracteres en el textarea
        function maximo(campo, limite) {
            if (campo.value.length >= limite) {
                campo.value = campo.value.substring(0, limite);
            }
        }

        

        function previewImage() {
            const preview = document.getElementById("preview");
            const image = document.getElementById("image").files[0];
            const reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }
            if (image) {
                reader.readAsDataURL(image);
            } else {
                preview.src = "";
            }
        }
        function previewPost() {
            const previewModal = document.getElementById("preview-modal");
            const name = document.getElementById("name").value;
            const description = document.getElementById("description").value;
            const direccion = document.getElementById("region").value;
            const latitude = document.getElementById("latitude").value;
            const longitude = document.getElementById("longitude").value;
            const previewImage = document.getElementById("preview-image");
            const previewdireccion = document.getElementById("preview-direccion");
            const previewName = document.getElementById("preview-name");
            const previewCoordinates = document.getElementById("preview-coordinates");
            const previewDescription = document.getElementById("preview-description");
            const fontSize = document.getElementById("font-size").value + "px";
            const fontFamily = document.getElementById("font-family").value;
            const colorValue = document.getElementById("color-select").value;

            const previewMap = document.getElementById("map");
            const mapURL = `https://maps.google.com/maps?q=${latitude},${longitude}&z=15&output=embed`;
            const map = `<iframe width="70%" height="500" src="${mapURL}"></iframe>`;
        
            previewMap.innerHTML = map;

        
            document.getElementById("cargar").style.display = "none";
            const ico= `<i class="bi bi-geo-alt"></i>`;
            previewImage.src = document.getElementById("preview").src;
            previewName.innerHTML = name;
            previewdireccion.innerHTML = ico +" "+ direccion;
            previewCoordinates.innerHTML = `Longitud: ${longitude}, Latitud: ${latitude}`;
            previewDescription.innerHTML = description;
            previewDescription.style.fontSize = fontSize;
            previewDescription.style.fontFamily = fontFamily;
            previewDescription.style.color = colorValue;

            previewModal.style.display = "block";
        }
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
        function showPosition(position) {
            document.querySelector('.myForm input[name ="latitude"]').value = position.coords.latitude;
            document.querySelector('.myForm input[name ="longitude"]').value = position.coords.longitude;

        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("Debes activar tu localización");
                    location.reload();
                    break;
                default:
                    break;
            }
        }
        document.getElementById("preview-button").addEventListener("click", function () {
            getLocation();
            //...
            const mapURL = `https://maps.google.com/maps?q=${latitude},${longitude}&z=15&output=embed`;
            //...
        });
        document.getElementById("form").addEventListener("submit", function (event) {
            event.preventDefault(); //para evitar el comportamiento por defecto del formulario
            const fontSize = document.getElementById("font-size").value;
            const fontFamily = document.getElementById("font-family").value;
            const colorValue = document.getElementById("color-select").value;
            //aqui se pueden asignar a un objeto o una variable y enviarlos junto con el formulario
            //ej. const data = {..., fontSize: fontSize, fontFamily: fontFamily};
            //y luego enviarlo al servidor utilizando una petición ajax o fetch
        });
        function closeModal() {
            document.getElementById("preview-modal").style.display = "none";
            document.getElementById("cargar").style.display = "block";
            
        }
        function changeFontSize() {
            const size = document.getElementById("font-size").value;
            document.getElementById("description").style.fontSize = size + "px";
        }
        function changeFontFamily() {
            const font = document.getElementById("font-family").value;
            document.getElementById("description").style.fontFamily = font;
        }

        function changeColor() {
            const colorValue = document.getElementById("color-select").value;
            document.getElementById("description").style.color = colorValue;
        }       
