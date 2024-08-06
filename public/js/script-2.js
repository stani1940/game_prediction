document.addEventListener('DOMContentLoaded', () => {
    // count-down-start
    let days = document.querySelector('.days');
    let hours = document.querySelector('.hours');
    let minutes = document.querySelector('.minutes');
    let seconds = document.querySelector('.seconds');
    const start = new Date('2024-06-14 22:00:00Z').getTime();

    function time() {
        requestAnimationFrame(time);
        const current = new Date().getTime();
        const remaining = start - current;
        let totalDay = Math.floor(remaining / 1000 / 60 / 60 / 24);
        let totalHour = Math.floor((remaining / 1000 / 60 / 60) % 24);
        let totalMin = Math.floor((remaining / 1000 / 60) % 60);
        let totalSec = Math.floor((remaining / 1000) % 60);
        days.innerText = `${totalDay < 10 ? '0' + totalDay : totalDay}`;
        hours.innerText = `${totalHour < 10 ? '0' + totalHour : totalHour}`;
        minutes.innerText = `${totalMin < 10 ? '0' + totalMin : totalMin}`;
        seconds.innerText = `${totalSec < 10 ? '0' + totalSec : totalSec}`;

        if (remaining < 0) {
            document.querySelector('.cup-count-down').innerHTML = `
             <h3 class="running">Europian Cup Running</h3>
             `;
            cancelAnimationFrame(time);
        }
    }
    time();
    // count-down-end
});
