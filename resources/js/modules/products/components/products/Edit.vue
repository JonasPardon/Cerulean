<template>
  <v-layout row justify-center>
    <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
      <v-card>
        <v-toolbar dark color="main">
          <v-btn icon dark @click="closeDialog">
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title>Product details</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn dark flat @click="saveProduct">Save</v-btn>
          </v-toolbar-items>
        </v-toolbar>
        <!-- <v-list three-line subheader> -->
          <v-subheader>General product information</v-subheader>
           <v-container grid-list-xl>
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
              <v-flex xs12 sm6>
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
                    v-model="product.description" />
              </v-flex>
              <v-flex xs12 sm6>
                  <v-textarea
                    label="Short Description"
                    v-model="product.short_description" />
              </v-flex>
              <v-flex xs12 sm6>
                  <v-textarea
                    label="Extra Description"
                    v-model="product.extra_description" />
              </v-flex>
            </v-layout>
          </v-container>
          <small>*indicates required field</small>
        <!-- </v-list> -->
        <v-divider></v-divider>
        <v-list three-line subheader>
          <v-subheader>General</v-subheader>
          <v-list-tile avatar>
            <v-list-tile-action>
              <v-checkbox ></v-checkbox>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>Notifications</v-list-tile-title>
              <v-list-tile-sub-title>Notify me about updates to apps or games that I downloaded</v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
          <v-list-tile avatar>
            <v-list-tile-action>
              <v-checkbox ></v-checkbox>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>Sound</v-list-tile-title>
              <v-list-tile-sub-title>Auto-update apps at any time. Data charges may apply</v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
          <v-list-tile avatar>
            <v-list-tile-action>
              <v-checkbox ></v-checkbox>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>Auto-add widgets</v-list-tile-title>
              <v-list-tile-sub-title>Automatically add home screen widgets</v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>
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
            this.$emit('close', this.product);
        },
        saveProduct() {
            this.$emit('save', this.product);
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
