<template>
   <v-layout row justify-center>
    <v-dialog v-model="dialog" persistent max-width="800px">
      <v-card>
        <v-card-title>
          <span class="headline">{{ this.category.id ? 'Edit' : 'New' }} category</span>
        </v-card-title>
        <v-card-text>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12 sm6 md4>
                <v-text-field label="Name*" required v-model="category.name"></v-text-field>
              </v-flex>
              <v-flex xs12>
                  <v-textarea
                    label="Description"
                    v-model="category.description" >

                  </v-textarea>
              </v-flex>
            </v-layout>
          </v-container>
          <small>*indicates required field</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" flat @click="closeDialog">Close</v-btn>
          <v-btn color="blue darken-1" flat @click="saveCategory">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-layout>
</template>

<script>
export default {
    name: 'category-edit',
    props: {
        category: {
            required: true,
            type: Object,
        },
        dialog: {
            required: true,
            type: Boolean,
        }
    },
    methods: {
        closeDialog() {
            this.$emit('close', this.category);
        },
        saveCategory() {
            this.$emit('save', this.category);
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
