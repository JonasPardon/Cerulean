<template>
  <v-dialog
    persistent
    v-model="condition"
    max-width="400"
  >
    <v-card>
      <v-card-title class="title font-weight-bold">
        {{ title }}
      </v-card-title>

      <v-card-text>
        <slot />
      </v-card-text>

      <v-divider />

      <v-card-actions>

        <v-spacer />

          <slot name="cancel">
            <v-btn
              flat
              :loading="cancelLoading"
              @click="$emit('cancel')"
            >
              {{ _cancelText }}
            </v-btn>
          </slot>

          <slot name="confirm">
            <v-btn
              color="primary"
              flat
              :loading="confirmLoading"
              @click="$emit('confirm')"
            >
              {{ _confirmText }}
            </v-btn>
          </slot>

        </v-card-actions>
      </v-card>
  </v-dialog>
</template>

<script>
export default {
  name: "confirm",

  props: {
    condition: {
      type: Boolean,
      required: true,
    },
    title: {
      type: String,
      required: true,
    },
    cancelText: {
      type: String,
      default: 'Cancel'
    },
    confirmText: {
      type: String,
      default: 'Confirm'
    },
    cancelLoading: {
      type: Boolean,
      default: false,
    },
    confirmLoading: {
      type: Boolean,
      default: false,
    },
  },

  computed: {
    _confirmText() {
      return this.confirmText;
    },
    _cancelText() {
      return this.cancelText;
    }
  },
};
</script>
