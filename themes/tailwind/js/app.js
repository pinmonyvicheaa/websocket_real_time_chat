
import "./bootstrap";
import { createApp } from "vue/dist/vue.esm-bundler.js";

const app = createApp({});

import ChatComponent from "./components/ChatComponent.vue";

app.component("chat-component", ChatComponent);

app.mount("#app");
