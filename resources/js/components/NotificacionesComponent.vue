<template>
    <div class="col-sm-6 centerDiv">
        <h1>Nueva notificación </h1>
        <form @submit.prevent="agregar()">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" v-model="notificacion.nombre">
            </div>
            <div class="form-group ">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" v-model="notificacion.telefono"> 
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" v-model="notificacion.email">
            </div>
            <div class="form-group ">
                <label for="asunto">Asunto</label>
                <input type="text" class="form-control" v-model="notificacion.asunto">
            </div>
            <button type="submit" class="btn btn-success btn-block">Submit</button>
        
        </form>
        <hr class="mt-3">
        <h2> Listado de notificaciones</h2>
        <ul class="list-group my-2">
            <li class="list-group-item"
            v-for="(item, index) in notificaciones" :key="index">
            <p>{{item.nombre}}</p>
            <p>{{item.telefono}}</p>
            <p>{{item.email}}</p>
            <p>{{item.asunto}}</p>
            <span class="badge badge-primary float right">{{item.updated_at}}</span>
            </li>
        </ul>
    </div>
    <form
</template>
<script>
    export default {
        data(){
            return{
                notificaciones:[],
                notificacion:{nombre:'',telefono:'',email:'',asunto:''}
            }
        },
        created(){
            axios.get('/api/muestra')
            .then(res =>{
                this.notificaciones = res.data;
                console.log(res.data);
            }).catch((error)=>{
                    console.log(error.response.data)
                })
        },
        methods:{
            agregar(){
                if(this.notificacion.nombre.trim()=== '' || this.notificacion.telefono.trim() === '' || this.notificacion.email.trim()=== '' || this.notificacion.asunto.trim() === ''){
                    alert('Debes completar todos los campos antes de guardar');
                    return;
                }
                const params = {
                    nombre: this.notificacion.nombre,
                    telefono: this.notificacion.telefono,
                    email: this.notificacion.email,
                    asunto: this.notificacion.asunto
                }
                this.notificacion.nombre = '';
                this.notificacion.telefono = '';
                this.notificacion.email = '';
                this.notificacion.asunto = '';
                axios.post('/api/guardar',params)
                .then( res =>{
                    this.notificaciones.push(res.data);
                    alert('Se ingresó una notificación!');
                }).catch((error)=>{
                    console.log(error.response.data)
                });
            }
        }
    }
</script>
