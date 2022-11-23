<template>
  <div class="app">
    

    
    <div class="card mb-3" style="height: 1900px">
      <div class="row g-0" v-if="filmsData.length !== 0">
        <div class="col-md-4">
          <img
            :src="require(`@/assets/${filmsData.img}`)"
            class="card-img-top imgss"
            alt="..."
          />
        </div>
        <div class="col-md-8 info">
          <div class="card-body">
            <p class="card-title filmNaam">{{ filmsData.naam }}</p>
            <p class="card-text filmLand">
              Jaar: {{ filmsData.jaar }} || Land: {{ filmsData.land }}
            </p>
            <p class="card-text filmBeschrijving">
              {{ filmsData.beschrijving }}
            </p>

            <p class="regisseur">
              Regisseur:
              <router-link to="person" class="routerlink">
                <span class="regisseurNaam">{{
                  filmsData.regisseur[0].naam
                }}</span>
              </router-link>
            </p>

            <p class="acteur">
              Acteurs:
              <router-link
                v-for="n in filmsData.acteurs"
                :key="n.id"
                to="persons"
                class="routerlink"
              >
                <span class="regisseurNaam">{{ n.naam }}</span
                >,
              </router-link>
            </p>
          </div>
        </div>
        <html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Star rating using pure CSS</title>
</head>

<body>
  <div class="rate">
    <input type="radio" id="star5" name="rate" value="5" /> 
    <label for="star5" title="text" >5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
  </div>
</body>

</html>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      FilmId: this.$route.params.id,
      filmsData: [],
    };
  },
  methods: {
    getFromDB() {
      fetch(
        "http://localhost/project_jaar2/blok6/project-film-db-blok-6-meko106/Meko_project_blok6/backend/public/ShowFilm/" +
          this.FilmId
      )
        .then((response) => response.json())
        .then((data) => (this.status = data))
        .then((data) => (this.filmsData = data.film))
        .then((data) => console.log(data));
    },
  },
  mounted() {
    this.getFromDB();
  },
};
</script>
<style scoped>
* {
  background-color: rgb(97, 97, 97);
}
.routerlink {
  text-decoration: none;
}
.filmNaam {
  font-size: 80px;
  color: white;
}
.filmBeschrijving {
  font-size: 33px;
  color: white;
}
.filmLand,
.regisseur,
.acteur {
  color: white;
  font-weight: bold;
  font-size: 33px;
}
.imgss {
  width: 401px;
  height: 596px;
}
.info {
  width: 1088px;
}
.regisseurNaam {
  font-weight: normal;
}

/* *{
    margin: 0;
    padding: 0;
} */
.rate {
  /* align-content: center; */
    height: 46px;
     margin: 20px 220px 1200px 0px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

/* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
</style>