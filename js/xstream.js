const xstream = {
    async get(t, a, s) {
        try {
            const r = await fetch(`${s.workers[Math.floor(Math.random()*s.workers.length)]}/api/${t}/${a}`),
                e = await r.json();
            return e.status ? e : {
                status: !1
            }
        } catch {
            return {
                status: !1
            }
        }
    }
};