<style>
/* ===============================
   WORKORA PRELOADER
================================ */
#workora-preloader{
  position: fixed;
  inset: 0;
  background: #ffffff;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  transition: opacity .4s ease;
}

.preloader-inner{
  display: flex;
  flex-direction: column;
  align-items: center;
}

/* ICON */
.preloader-logo{
  width: 100px;
  opacity: 0;

  /* fade in */
  animation:
    logoFade 1s ease forwards,
    logoSpin 2.4s linear infinite;

  /* wait slightly before spinning */
  animation-delay: 0s, .2s;
}

/* WORDING IMAGE */
.preloader-wording{
  margin-top: 10px;
  height: 70px;
  opacity: 0;
  transform: translateY(14px);
  animation: wordingUp 1s ease forwards;
  animation-delay: .65s;
}

/* ===============================
   ANIMATIONS
================================ */
@keyframes logoFade{
  from{
    opacity: 0;
    transform: scale(.96);
  }
  to{
    opacity: 1;
    transform: scale(1);
  }
}

/* 🔄 Smooth spin */
@keyframes logoSpin{
  from{
    transform: rotate(0deg);
  }
  to{
    transform: rotate(360deg);
  }
}

@keyframes wordingUp{
  from{
    opacity: 0;
    transform: translateY(14px);
  }
  to{
    opacity: 1;
    transform: translateY(0);
  }
}
</style>


<!-- WORKORA PRELOADER -->
<div id="workora-preloader">
  <div class="preloader-inner">

    <!-- Icon -->
    <img src="/icon.webp"
         alt="Workora Icon"
         class="preloader-logo">

    <!-- Wording image -->
    <img src="/wording.webp"
         alt="Workora"
         class="preloader-wording">

  </div>
</div>

<script>
window.addEventListener('load', () => {
  const loader = document.getElementById('workora-preloader');

  setTimeout(() => {
    loader.style.opacity = '0';
    setTimeout(() => loader.remove(), 400);
  }, 1600);
});
</script>

