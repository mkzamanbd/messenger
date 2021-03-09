<template>
    <div class="messenger">
        <div class="row">
            <div class="col-md-4">
                <div class="card-header">Users</div>
                <div class="content" style="height: 450px; overflow-y: scroll; overflow-x: hidden">
                    <div class="card p-2 mt-2 btn text-start" v-for="(user, index) in users" :key="index">
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
                <div class="card-body p-0" style="height: 450px; overflow-y: scroll; overflow-x: hidden">
                    <div class="content mt-2" v-if="selected_user">
                        <div class="message" id="message">
                            <ul class="list-group">
                                <li class="list-group-item" v-for="(message, index) in messages" :key="index">
                                    <div class="rounded p-3" style="width: 70%" :class="`${message.to === selected_user.id ? 'text-right float-right bg-to' : 'bg-from'}`">
                                        <p>{{ message.text }}</p>
                                        <p>Time: {{ message.created_at }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <form action="#" class="mt-3">
                            <div class="form-group">
                                <textarea type="text" v-model="form.text" class="form-control" @keydown.enter="submit" rows="2"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            users:{ type:Array, required:true }
        },
        data(){
            return{
                messages: [],
                form:{
                    text: '',
                    user_id: '',
                },
                selected_user: ''
            }
        },
        methods:{
            // scrollToBottom() {
            //     setTimeout(() => {
            //         this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
            //     }, 50);
            // },
            selectUser(user){
                // console.log(user)
                this.form.user_id = user.id;
                this.selected_user = user;
                this.getMessages();
            },
            getMessages(){
                axios.get(baseURL + '/get-message?id=' + this.selected_user.id).then(response =>{
                    this.messages = response.data;
                }).catch(error =>{
                    console.log(error);
                })
            },
            submit(e){
                e.preventDefault();
                axios.post(baseURL + '/send-message',this.form).then(response =>{
                    console.log(response.data);
                    this.getMessages();
                    this.form.text = '';
                }).catch(error =>{
                    console.log(error);
                })
            }
        },
        watch: {
            // contact(selected_user) {
            //     this.scrollToBottom();
            // },
            // messages(messages) {
            //     this.scrollToBottom();
            // }
        }
    }
</script>
