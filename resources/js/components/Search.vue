<template>
    <div> 
        <input id="search" name="search" 
            v-debounce:200ms="searchText"
            v-model="text"  
            class="form-input block w-full pl-4 sm:text-sm sm:leading-5" 
            placeholder="Search..."
            @keydown.up="up"
            @keydown.down="down"
            @keydown.enter.prevent="hit" 
            autofocus 
        />
        <ul v-if="text">
            <li v-show="hasItems" v-for="(item, index) in items" :key="index" class="search-results" :class="activeClass(index)"  @mousedown="hit" @mousemove="setActive(index)">
                <span class="name" v-html="$options.filters.highlight(item.first_name + ' ' + item.last_name, text)"></span>  
                <span class="company-name" v-html="$options.filters.highlight(item.company.name, text)"></span>
            </li>
            <li v-show="!hasItems && !loading" class="py-4 px-4">
                Beep Beep. No results...
            </li>
        </ul> 
  </div>
</template>
<script>
export default {
    name: 'Search',
    data(){
        return {
            text: null,
            current: -1, 
            laoding: false,
            items: []   
        }
    },
    computed: {
        hasItems () {
            return this.items.length > 0
        },
    }, 
    filters: {
        highlight: function (word, query) {   
            var check = new RegExp(query, "ig");
            return word.toString().replace(check, function(matchedText,a,b){
                return ('<p class=\'highlight\'>' + matchedText + '</p>');
            })  
        }
    },
    methods:{
        reset () { 
            this.text = null
            this.current = - 1 
        },
        setActive (index) {
            this.current = index
        },
        up () {
            if (this.current > 0) {
                this.current--
            } else if (this.current === -1) {
                this.current = this.items.length - 1
            } else {
                this.current = -1
            }
        },
        activeClass (index) {
            return {
                active: this.current === index
            }
        },
        down () {
            if (this.current < this.items.length - 1) {
                this.current++
            } else {
                this.current = -1
            }
        },
        hit () { 
            let text = this.text
            if(this.current > -1){
                const item = this.items[this.current];
                if(item)
                text =`${item.first_name} ${item.last_name} "${item.company.name}"`
            }
            window.location.href = `http://localhost:8000/?search=${text}`
        }, 
        searchText(input) { 
            this.laoding = true
           axios
            .get(`http://localhost:8000/api/users?search=${this.text}`)
            .then(response => this.items = response.data)
            .finally(()=> this.laoding = false);
        }
    }
}
</script>
<style>
.search-results {
    cursor:pointer
}
.highlight {
    background-color: yellow;
    display: inline-block;
    font-style: italic
}
ul {
  position: absolute;
  padding: 0;
  margin-top: 8px;
  min-width: 100%;
  background-color: #fff;
  list-style: none;
  border-radius: 4px;
  box-shadow: 0 0 10px rgba(0,0,0, 0.25);
  z-index: 1000;
}
li {
  padding: 10px 16px;
  border-bottom: 1px solid #ccc;
  cursor: pointer;
}
li:first-child {
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
}
li:last-child {
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 4px;
  border-bottom: 0;
}
span {
  display: block;
  color: #2c3e50;
}
.active {
  background-color: #3aa373;
}
.active span {
  color: white;
}

.name {
  font-weight: 700;
  font-size: 18px;
}
.company-name {
  font-style: italic;
}
</style>
