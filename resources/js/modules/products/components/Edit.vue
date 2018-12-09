<template>
   <v-layout row justify-center>
    <v-dialog v-model="dialog" persistent max-width="800px">
      <v-card>
        <v-card-title>
          <span class="headline">Edit product</span>
        </v-card-title>
        <v-card-text>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12 sm6 md4>
                <v-text-field label="Name*" required v-model="product.name"></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4>
                <v-text-field label="Price*" required v-model="product.price_per_unit"></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md2>
                <v-text-field
                  label="Unit*"
                  required
                  v-model="product.unit"
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md2>
                <v-text-field
                  label="Currency*"
                  required
                  v-model="product.currency"
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md2>
                <v-text-field label="Weight*" required v-model="product.weight"></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md2>
                <v-text-field label="Weight unit*" required v-model="product.weight_unit"></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md2>
                <v-text-field label="Stock*" required v-model="product.stock"></v-text-field>
              </v-flex>
              <v-flex xs12>
                <v-combobox
                    v-model='product.categories'
                    :items="['Category one', 'Category two', 'Category three']"
                    item-text="name"
                    item-value='id'
                    label="Product categories"
                    chips
                    clearable
                    multiple >
                </v-combobox>
              </v-flex>
              <v-flex xs12>
                  <v-textarea
                    label="Description"
                    v-model="product.description" >

                  </v-textarea>
              </v-flex>
            </v-layout>
          </v-container>
          <small>*indicates required field</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" flat @click="closeDialog">Close</v-btn>
          <v-btn color="blue darken-1" flat @click="saveProduct">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-layout>
</template>

<script>
export default {
    name: 'product-edit',
    props: {
        product: {
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
            this.dialog = false;
            this.$emit('close', this.product);
        },
        saveProduct() {
            this.dialog = false;
            this.$emit('save', this.product);
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
