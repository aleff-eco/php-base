<div class="h-full mb-4 rounded-lg shadow-xl dark:-gray-600">
    <div class="container px-4 py-8 mx-auto">
        <div class="mx-auto overflow-hidden bg-white rounded-lg dark:bg-gray-700 ">
            <div class="px-6 py-4">
                <h2 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white">Formulario para editar</h2>
                <p class="mb-4 text-gray-600 dark:text-white">Editar  item</p>
                <form>
                    <div class="mb-4">
                        <label for="nombre"
                            class="block mb-2 font-semibold text-gray-700 dark:text-white">Nombre</label>
                        <input type="text" id="nombre" name="nombre"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <form class="max-w-sm mx-auto">
                            <label for="seleccion"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona
                                una opción</label>
                            <select id="seleccion"
                                class="bg-gray-50 border border-gray-300 dark:border dark:border-white text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Opción default</option>
                                <option value="op1">opción 1</option>
                                <option value="op2">opción 2</option>
                                <option value="op3">opción 3</option>

                            </select>
                        </form>
                    </div>

                    <div class="w-full mb-6 overflow-auto ">
                        <label for="texto" class="block mb-2 font-semibold text-gray-700">Texto</label>

                        <div class="w-full overflow-auto h-52">
                            <div class="h-full centered">
                                <div class="h-full row row-editor">
                                    <div class="h-full editor-container">
                                        <textarea id="mensaje" name="mensaje" rows="4"
                                            class="w-full h-full px-3 py-2 bg-scroll border border-gray-300 rounded-2xl editor focus:outline-none focus:border-blue-500"></textarea>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="flex items-center justify-center px-6 py-4 mt-5 bg-white dark:bg-gray-700">
                            <div class="flex flex-col">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">Subir
                                    imagen</label>
                                <input accept="image/*"
                                    class="block w-full text-sm text-gray-900 bg-white border border-gray-300 rounded-lg cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="file_input_help" id="file_input" type="file">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
                                    SVG, PNG,
                                    JPG or GIF (MAX. 800x400px).</p>
                            </div>
                            <div class="flex flex-col ">
                                <p class="text-center text-gray-600 dark:text-white">Imagen de 150 x 150 no mayor a 2mb
                                </p>

                                <img src="https://via.placeholder.com/150" alt="Placeholder" class="mx-auto mt-4">
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Enviar</button>
                        </div>
                </form>
            </div>

        </div>
    </div>
    
</div>
