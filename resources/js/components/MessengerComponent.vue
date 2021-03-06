<template>
    <div class="messenger">
        <div class="row">
            <div class="col-md-4">
                <div class="card-header">Users</div>
                <div class="content">
                    <div class="card p-2 mt-2 btn text-left" v-for="(user, index) in users" :key="index">
                        <div class="row" @click="selectUser(user)">
                            <div class="col-3">
                                <img :src="'https://ui-avatars.com/api/?name=' + user.name" alt="" class="rounded-circle">
                            </div>
                            <div class="col-9">
                                <h5>{{ user.name }}</h5>
                                <p>{{ user.email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-8">
                <div class="card-header">Messages</div>
                <div class="content mt-2">
                    <div class="message-box">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="text-right bg-success rounded p-3">
                                    <p>An item</p>
                                    <p>Time: 5 min ago</p>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="bg-secondary rounded p-3">
                                    <p>An item</p>
                                    <p>Time: 5 min ago</p>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="bg-secondary rounded p-3">
                                    <p>An item</p>
                                    <p>Time: 5 min ago</p>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="text-right bg-success rounded p-3">
                                    <p>An item</p>
                                    <p>Time: 5 min ago</p>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="bg-secondary rounded p-3">
                                    <p>An item</p>
                                    <p>Time: 5 min ago</p>
                                </div>
                            </li>
                        </ul>  
                    </div>
                    <form action="#" class="mt-3">
                        <div class="form-group">
                            <textarea type="text" v-model="message" class="form-control" @keydown.enter="submit" rows="2"></textarea>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            users:{default:[], type:Array}
        },
        data(){
            return{
                message: ''
            }
        },
        mounted() {

        },
        methods:{
            selectUser(id){
                console.log(id)
            },
            submit(e){
                e.preventDefault();
                console.log(this.message)
                this.message = ''
            }
        }
    }
</script>
