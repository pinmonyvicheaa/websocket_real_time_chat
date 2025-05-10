<template>
    <div>
        <!-- Chat Messages -->
        <div class="flex flex-col justify-end h-[58vh]">
            <div ref="messagesContainer" class="p-4 overflow-y-auto max-h-fit">
                <div
                    v-for="message in messages"
                    :key="message.id"
                    class="flex flex-col items-start mb-2"
                >
                    <div
                        :class="[
                            message.sender_id === currentUser.id
                                ? 'ml-auto bg-green-500 text-white'
                                : 'mr-auto bg-gray-200 text-gray-800',
                        ]"
                        class="p-2 rounded-lg max-w-xs"
                    >
                        <div>{{ message.text }}</div>
                        <div
                            :class="
                                message.sender_id === currentUser.id
                                    ? 'text-white'
                                    : 'text-gray-500'
                            "
                            class="text-[11px] text-right mt-1"
                        >
                            {{ formatDate(message.created_at) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Typing Indicator -->
        <small v-if="isFriendTyping" class="text-gray-700">
            {{ friend.name }} is typing...
        </small>

        <!-- Input Box -->
        <div class="flex items-center mb-4">
            <input
                type="text"
                v-model="newMessage"
                @keydown="sendTypingEvent"
                @keyup.enter="sendMessage"
                placeholder="Type a message..."
                class="flex-1 px-2 py-2 border-2 border-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 rounded-lg"
            />
            <button
                @click="sendMessage"
                class="px-4 py-2 ml-2 text-white bg-green-500 rounded-lg"
            >
                Send
            </button>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { nextTick, onMounted, ref, watch } from "vue";

const props = defineProps({
    friend: {
        type: Object,
        required: true,
    },
    currentUser: {
        type: Object,
        required: true,
    },
});

const messages = ref([]);
const newMessage = ref("");
const messagesContainer = ref(null);
const isFriendTyping = ref(false);
const isFriendTypingTimer = ref(null);

// Format date-time
const formatDate = (datetime) => {
    if (!datetime) return "";
    const date = new Date(datetime);
    if (isNaN(date)) return datetime;
    return date.toLocaleString(); // Use toLocaleTimeString() if only time is needed
};

// Scroll to bottom when messages update
watch(
    messages,
    () => {
        nextTick(() => {
            if (messagesContainer.value) {
                messagesContainer.value.scrollTo({
                    top: messagesContainer.value.scrollHeight,
                    behavior: "smooth",
                });
            }
        });
    },
    { deep: true }
);

// Send message to backend
const sendMessage = () => {
    if (newMessage.value.trim() !== "") {
        axios
            .post(`/messages/${props.friend.id}`, {
                message: newMessage.value,
            })
            .then((response) => {
                messages.value.push(response.data);
                newMessage.value = "";
            });
    }
};

// Emit typing whisper
const sendTypingEvent = () => {
    Echo.private(`chat.${props.friend.id}`).whisper("typing", {
        userID: props.currentUser.id,
    });
};

// On component mount
onMounted(() => {
    // Load existing messages
    axios.get(`/messages/${props.friend.id}`).then((response) => {
        console.log(response.data); // Confirm created_at is present
        messages.value = response.data;
    });

    // Listen for new messages and typing events
    Echo.private(`chat.${props.currentUser.id}`)
        .listen("MessageSent", (response) => {
            messages.value.push(response.message);
        })
        .listenForWhisper("typing", (response) => {
            isFriendTyping.value = response.userID === props.friend.id;

            if (isFriendTypingTimer.value) {
                clearTimeout(isFriendTypingTimer.value);
            }

            isFriendTypingTimer.value = setTimeout(() => {
                isFriendTyping.value = false;
            }, 1000);
        });
});
</script>
