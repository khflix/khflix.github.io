function getUniqueHosts(e) {
    const t = {};
    return e.forEach((e => {
        e.status && (t[e.name] = [e.site, e.price])
    })), t
}(async () => {
    const e = `${window.location.origin}${window.location.pathname.replace(/\/$/,"")}`,
        [t, n] = await Promise.all([fetch("config.json").then((e => e.json())), fetch("https://connected.pages.dev/regEx.json").then((e => e.json()))]);
    document.getElementById("advast").value = t.player.showAD;
    const o = e => new URLSearchParams(window.location.search).get(e),
        s = document.getElementById("url"),
        a = document.getElementById("hosts"),
        r = document.getElementById("host_hidden"),
        i = document.getElementById("submit");
    i.disabled = !0;
    s.addEventListener("input", (() => {
        a.value = "Unsupported";
        for (const e of n)
            if (new RegExp(e.pattern, "gm").test(s.value)) {
                a.add(new Option(e.host, e.host)), a.value = r.value = e.host, i.removeAttribute("disabled");
                break
            }
    }));
    if ("GET" === o("submit")) {
        const t = o("url"),
            s = o("thumbnail"),
            a = o("sub"),
            r = o("sub_label"),
            i = o("title"),
            l = o("host");
        for (const o of n)
            if (l === o.host && new RegExp(o.pattern).test(t)) {
                const n = `${e}/play.html?id=${o.prefix+t.match(new RegExp(o.pattern))[1]}&thumbnail=${s}&sub=${a}&sub_label=${r}&title=${i.replace(/\+/gm," ")}`;
                document.getElementById("xdirect").innerHTML = n, document.getElementById("xembed").innerHTML = `<iframe src="${n}" width="100%" height="100%" frameborder="0" scrolling="no" allowfullscreen></iframe>`, document.getElementById("xiframe").innerHTML = `<iframe src="${n}" width="100%" height="100%" frameborder="0" scrolling="no" allowfullscreen></iframe>`, document.querySelector("#xdirect").scrollIntoView({
                    behavior: "smooth"
                });
                break
            }
    }
    const l = document.getElementById("popupButton"),
        c = document.getElementById("popupContainer"),
        d = document.getElementById("closeButton"),
        m = document.getElementById("popupContentInner"),
        u = getUniqueHosts(n);
    let p = "";
    Object.keys(u).forEach((e => {
        const t = u[e][0],
            n = u[e][1];
        p += `<p>${e} (<span style="color: green;">Price: $${n}</span>) (<a target="_blank" href="${t}">${t}</a>)</p>`
    })), l.addEventListener("click", (function() {
        m.innerHTML = p, c.style.display = "flex"
    })), d.addEventListener("click", (function() {
        c.style.display = "none"
    }))
})();
const startTime = performance.now();
window.addEventListener("load", (() => {
    const e = (performance.now() - startTime) / 1e3;
    document.getElementById("btnLeftMenu").innerHTML = `&nbsp;&nbsp;&nbsp;<b>The page was generated in ${e.toFixed(4)} s &#x26A1;</b>`
}));