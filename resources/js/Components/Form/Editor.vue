<script setup lang="ts">
import { EditorContent, useEditor} from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import Underline from '@tiptap/extension-underline'
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faBold, faItalic, faUnderline, faUndo, faRedo, faStrikethrough, faCode, faMinus, faList, faListOl, faParagraph, faQuoteLeft  } from
      "@fortawesome/free-solid-svg-icons";

const props = defineProps<{
  modelValue: String
}>()

const emit = defineEmits(['update:modelValue'])
const editor = useEditor(
    {
      content: props.modelValue,
      onUpdate:({editor}) => {
        emit('update:modelValue', editor.getHTML());
      },
      extensions: [StarterKit, Underline],
      editorProps:{
        attributes:{
          class: 'border border-gray-200 p-4 bg-white min-h-[12rem] max-h-[12rem] overflow-y-auto prose max-w-none',
        }
      }
    }
)
</script>

<template>
  <section class="flex flex-col w-full">

  <div class="buttons flex justify-between items-center flex-wrap gap-x-4 border-t border-l border-r border-gray-500 p-4 bg-gray-50"
           v-if="editor">

        <button @click.prevent="editor.chain().focus().toggleBold().run()" :disabled="!editor.can().chain().focus().toggleBold().run()"
                class="p-1 rounded"
                :class="{
          'bg-gray-200': editor.isActive('bold') }">
          <FontAwesomeIcon :icon="faBold" title="Bold"></FontAwesomeIcon>
        </button>
        <button @click.prevent="editor.chain().focus().toggleItalic().run()" :disabled="!editor.can().chain().focus().toggleItalic().run()"
                class="p-1 rounded"
                :class="{
          'bg-gray-200': editor.isActive('italic') }">
          <FontAwesomeIcon :icon="faItalic" title="Italic"></FontAwesomeIcon>
        </button>
    <button @click.prevent="editor.chain().focus().toggleUnderline().run()" :disabled="!editor.can().chain().focus().toggleUnderline().run()"
            :class="{
          'bg-gray-200': editor.isActive('code') }">
      <FontAwesomeIcon :icon="faUnderline" title="Underline"></FontAwesomeIcon>
    </button>
        <button @click.prevent="editor.chain().focus().toggleStrike().run()" :disabled="!editor.can().chain().focus().toggleStrike().run()" class="p-1 rounded" :class="{
          'is-active': editor.isActive('strike') }">
          <FontAwesomeIcon :icon="faStrikethrough" title="Strike"></FontAwesomeIcon>
        </button>
<!--        <button @click.prevent="editor.chain().focus().toggleCode().run()" :disabled="!editor.can().chain().focus().toggleCode().run()" :class="{-->
<!--          'bg-gray-200': editor.isActive('code') }">-->
<!--          Code-->
<!--        </button>-->

        <button @click.prevent="editor.chain().focus().setParagraph().run()" class="p-1 rounded" :class="{ 'bg-gray-200':
        editor.isActive('paragraph') }">
          <FontAwesomeIcon :icon="faParagraph" title="Paragraph"></FontAwesomeIcon>
        </button>
        <button @click.prevent="editor.chain().focus().toggleHeading({ level: 1 }).run()"  class="p-1 rounded" :class="{ 'bg-gray-200': editor.isActive('heading', {
          level:
        1 })
        }">
          H1
        </button>
        <button @click.prevent="editor.chain().focus().toggleHeading({ level: 2 }).run()"  class="p-1 rounded" :class="{ 'bg-gray-200': editor.isActive('heading', {
          level:
        2 })
        }">
          H2
        </button>

        <button @click.prevent="editor.chain().focus().toggleBulletList().run()"  class="p-1 rounded" :class="{ 'bg-gray-200': editor.isActive('bulletList') }">
          <FontAwesomeIcon :icon="faList" title="List"></FontAwesomeIcon>
        </button>
        <button @click.prevent="editor.chain().focus().toggleOrderedList().run()"  class="p-1 rounded" :class="{ 'bg-gray-200': editor.isActive('orderedList') }">
          <FontAwesomeIcon :icon="faListOl" title="Ordered List"></FontAwesomeIcon>

        </button>
        <button @click.prevent="editor.chain().focus().toggleCodeBlock().run()"  class="p-1 rounded" :class="{ 'bg-gray-200': editor.isActive('codeBlock') }">
          <FontAwesomeIcon :icon="faCode" title="Code Block"></FontAwesomeIcon>

        </button>
        <button @click.prevent="editor.chain().focus().toggleBlockquote().run()"  class="p-1 rounded" :class="{ 'bg-gray-200':
        editor.isActive('blockquote') }">
          <FontAwesomeIcon :icon="faQuoteLeft" title="Block Quote"></FontAwesomeIcon>

        </button>
        <button  class="p-1 rounded" @click.prevent="editor.chain().focus().setHorizontalRule().run()">
          <FontAwesomeIcon :icon="faMinus" title="Horizontal Rule"></FontAwesomeIcon>

        </button>
<!--        <button @click.prevent="editor.chain().focus().setHardBreak().run()">-->
<!--          Hard break-->
<!--        </button>-->
        <button @click.prevent="editor.chain().focus().undo().run()" :disabled="!editor.can().chain().focus().undo().run()"
                class="p-1 disabled:text-gray-400">
          <FontAwesomeIcon :icon="faUndo" title="Ordered List"></FontAwesomeIcon>

        </button>
        <button @click.prevent="editor.chain().focus().redo().run()" :disabled="!editor.can().chain().focus().redo().run()" class="p-1 disabled:text-gray-400">
          <FontAwesomeIcon :icon="faRedo" title="Redo"></FontAwesomeIcon>

        </button>


  </div>
  <editor-content :editor="editor"></editor-content>
  </section>
</template>

<style scoped>

</style>