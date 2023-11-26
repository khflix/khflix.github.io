function player(e, t, a, l, r, o) {
    document.getElementById("loading")?.remove(), jwplayer("player").setup({
        sources: e,
        image: t,
        title: getQueryParam("title"),
        width: r.player.width,
        height: r.player.height,
        aspectratio: null,
        preload: r.player.preload,
        aboutlink: r.player.aboutlink,
        abouttext: r.player.abouttext,
        allowFullscreen: r.player.allowFullscreen,
        autostart: r.player.autostart,
        mute: r.player.mute,
        repeat: r.player.loop,
        advertising: {
            client: r.player.advertising.client,
            admessage: r.player.advertising.admessage,
            schedule: Object.fromEntries(r.player.advertising.offset.map(((e, t) => [`adbreak${t+1}`, {
                offset: e,
                tag: a
            }])))
        },
        logo: r.player.logo,
        tracks: [{
            kind: r.player.tracks.kind,
            file: getQueryParam("sub") || null,
            label: getQueryParam("sub_label") || null
        }, {
            kind: "thumbnails",
            file: l
        }],
        captions: r.player.captions,
        sharing: {},
        cast: {},
        playbackRateControls: r.player.playbackRateControls
    }), "doodstream" == o && jwplayer("player").addButton("https://delivrjs.github.io/delivrjs/assets/custom-icons/download.svg", "Download Video", (() => {
        window.open(e[jwplayer("player").getCurrentQuality()].download, "_self")
    }), "download"), jwplayer("player").addButton("https://delivrjs.github.io/delivrjs/assets/custom-icons/forward.png", "Forward 10 Seconds", (() => {
        jwplayer().seek((jwplayer().getPosition() + 10).toFixed(1))
    }), "Forward 10 seconds"), jwplayer("player").on("adBlock", (function() {
        if (r.player.fuckadblock && r.player.showAD) {
            const e = {
                file: "https://delivrjs.github.io/delivrjs/assets/video/adblock.mp4",
                type: "video/mp4",
                image: "https://delivrjs.github.io/delivrjs/assets/img/adblock.jpeg",
                width: r.player.width,
                height: r.player.height,
                preload: r.player.preload,
                controls: !1,
                autostart: !0,
                repeat: !0,
                logo: r.player.logo
            };
            document.getElementById("loading")?.remove(), jwplayer("player").setup(e)
        }
    }))
}

function goFilePlayer(e, t, a) {
    document.getElementById("loading")?.remove(), jwplayer("player").setup({
        playlist: e,
        width: a.player.width,
        height: a.player.height,
        aspectratio: null,
        preload: a.player.preload,
        aboutlink: a.player.aboutlink,
        abouttext: a.player.abouttext,
        allowFullscreen: a.player.allowFullscreen,
        autostart: a.player.autostart,
        mute: a.player.mute,
        repeat: a.player.loop,
        advertising: {
            client: a.player.advertising.client,
            admessage: a.player.advertising.admessage,
            schedule: Object.fromEntries(a.player.advertising.offset.map(((e, a) => [`adbreak${a+1}`, {
                offset: e,
                tag: t
            }])))
        },
        logo: a.player.logo,
        tracks: [{
            kind: a.player.tracks.kind,
            file: getQueryParam("sub") || null,
            label: getQueryParam("sub_label") || null
        }],
        captions: a.player.captions,
        sharing: {},
        cast: {},
        playbackRateControls: a.player.playbackRateControls
    }), jwplayer("player").addButton("https://delivrjs.github.io/delivrjs/assets/custom-icons/forward.png", "Forward 10 Seconds", (() => {
        jwplayer().seek((jwplayer().getPosition() + 10).toFixed(1))
    }), "Forward 10 seconds"), jwplayer("player").addButton("https://delivrjs.github.io/delivrjs/assets/custom-icons/forward.png", "Forward 10 Seconds", (() => {
        jwplayer().seek((jwplayer().getPosition() + 10).toFixed(1))
    }), "Forward 10 seconds"), jwplayer("player").addButton("https://delivrjs.github.io/delivrjs/assets/custom-icons/download.svg", "Download Video", (() => {
        window.location.href = jwplayer("player").getPlaylistItem().file + "&f=download"
    }), "download"), jwplayer("player").on("adBlock", (function() {
        if (a.player.fuckadblock && a.player.showAD) {
            const e = {
                file: "https://delivrjs.github.io/delivrjs/assets/video/adblock.mp4",
                type: "video/mp4",
                image: "https://delivrjs.github.io/delivrjs/assets/img/adblock.jpeg",
                width: a.player.width,
                height: a.player.height,
                preload: a.player.preload,
                controls: !1,
                autostart: !0,
                repeat: !0,
                logo: a.player.logo
            };
            document.getElementById("loading")?.remove(), jwplayer("player").setup(e)
        }
    }))
}

function err(e) {
    document.getElementById("loading")?.remove(), jwplayer("player").setup({
        file: "https://delivrjs.github.io/delivrjs/assets/video/404.mp4",
        type: "video/mp4",
        width: e.player.width,
        height: e.player.height,
        preload: e.player.preload,
        autostart: !0,
        repeat: !0,
        logo: e.player.logo,
        controls: !1
    })
}

function getQueryParam(e) {
    return new URLSearchParams(window.location.search).get(e) ?? null
}

function changeVideo(e) {
    document.getElementById("x-matroska").innerHTML = '<video id="plyr-video" preload="none" poster="' + e.image + '" controls><source src="' + e.file + '"></video>';
    new Plyr("#plyr-video", {
        controls: ["play-large", "restart", "rewind", "play", "fast-forward", "progress", "current-time", "duration", "mute", "volume", "captions", "settings", "pip", "airplay", "download", "fullscreen"],
        urls: {
            download: `${e.file}&f=download`
        }
    })
}(async () => {
    const [e, t] = await Promise.all([fetch("https://connected.pages.dev/regEx.json").then((e => e.json())), fetch("config.json").then((e => e.json()))]), a = getQueryParam("id");
    if (!a) return err(t);
    let l, r;
    for (const {
            prefix: t,
            host: o
        }
        of e) {
        if (new RegExp(t, "gm").test(a)) {
            l = o, r = a.replace(t, "");
            break
        }
    }
    if (!l || !r) return err(t);
    const o = await xstream.get(l, r, t);
    if (!o || !o.status) return err(t);
    "googlephotos" === o.host && document.head.insertAdjacentHTML("afterbegin", '<meta name="referrer" content="never"/><meta name="referrer" content="no-referrer"/>');
    const s = o.sources,
        i = getQueryParam("thumbnail") || o.image,
        n = t.player.showAD ? t.player.advertising.adTag : null,
        d = o.vtt;
    if ("gofile" === o.host)
        if ("plyr" == o.player) {
            document.getElementById("loading")?.remove(), document.getElementById("x-matroska").innerHTML = '<video id="plyr-video" preload="none" poster="' + o.playlist[0].image + '" controls><source src="' + o.playlist[0].file + '"></video>';
            if (new Plyr("#plyr-video", {
                    controls: ["play-large", "restart", "rewind", "play", "fast-forward", "progress", "current-time", "duration", "mute", "volume", "captions", "settings", "pip", "airplay", "download", "fullscreen"],
                    urls: {
                        download: `${o.playlist[0].file}&f=download`
                    }
                }), o.playlist.length > 1) {
                const e = document.getElementById("button-container");
                o.playlist.forEach(((t, a) => {
                    const l = document.createElement("button");
                    l.textContent = `Play Video ${a+1}`, l.className = "video-button", l.addEventListener("click", (() => {
                        changeVideo(t)
                    })), e.appendChild(l)
                }))
            }
        } else goFilePlayer(o.playlist, n, t);
    else player(s, i, n, d, t, o.host)
})();