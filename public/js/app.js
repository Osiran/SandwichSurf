/* SandwichSurf builder: live price, visual preview, and a multi-sandwich cart. */
(function () {
    "use strict";

    var addBtn = document.getElementById("addToCart");
    if (!addBtn) return; // Only run on the order builder page.

    var cart = []; // [{bread,cheese,meat,sauce,vegetables:[...],quantity,unitPrice,summary}]

    var money = function (n) { return "CHF " + Number(n).toFixed(2); };

    // Read the currently selected option of a radio/checkbox group.
    function pick(name) {
        var el = document.querySelector('input[name="' + name + '"]:checked');
        return el ? { id: Number(el.value), label: el.dataset.label, price: Number(el.dataset.price) } : null;
    }
    function pickVegetables() {
        return Array.prototype.map.call(
            document.querySelectorAll('input[name="vegetables[]"]:checked'),
            function (el) { return { id: Number(el.value), label: el.dataset.label, price: Number(el.dataset.price) }; }
        );
    }

    function currentSelection() {
        return {
            bread: pick("bread"),
            cheese: pick("cheese"),
            meat: pick("meat"),
            sauce: pick("sauce"),
            vegetables: pickVegetables(),
        };
    }

    function unitPrice(sel) {
        var p = 0;
        ["bread", "cheese", "meat", "sauce"].forEach(function (k) { if (sel[k]) p += sel[k].price; });
        sel.vegetables.forEach(function (v) { p += v.price; });
        return p;
    }

    function isComplete(sel) {
        return sel.bread && sel.cheese && sel.meat && sel.sauce;
    }

    // ---- visual preview -------------------------------------------------------
    var LAYER = {
        bread:  { emoji: "🍞", bg: "#f5d79e" },
        sauce:  { emoji: "🥫", bg: "#f6b26b" },
        cheese: { emoji: "🧀", bg: "#ffe066" },
        meat:   { emoji: "🥩", bg: "#e08d79" },
        veg:    { emoji: "🥬", bg: "#a8d08d" },
    };
    function layerRow(kind, label) {
        var cfg = LAYER[kind];
        var row = document.createElement("div");
        row.className = "w-40 rounded-full text-center text-xs text-slate-900 shadow-sm py-1";
        row.style.background = cfg.bg;
        row.textContent = cfg.emoji + " " + label;
        return row;
    }

    function renderPreview() {
        var sel = currentSelection();
        var preview = document.getElementById("preview");
        var details = document.getElementById("previewDetails");
        preview.innerHTML = "";

        // Top bun
        if (sel.bread) preview.appendChild(layerRow("bread", sel.bread.label + " (oben)"));
        sel.vegetables.forEach(function (v) { preview.appendChild(layerRow("veg", v.label)); });
        if (sel.sauce) preview.appendChild(layerRow("sauce", sel.sauce.label));
        if (sel.cheese) preview.appendChild(layerRow("cheese", sel.cheese.label));
        if (sel.meat) preview.appendChild(layerRow("meat", sel.meat.label));
        if (sel.bread) preview.appendChild(layerRow("bread", sel.bread.label + " (unten)"));

        if (!sel.bread && !sel.cheese && !sel.meat && !sel.sauce && sel.vegetables.length === 0) {
            preview.innerHTML = '<p class="text-sm text-slate-400">Wählen Sie Ihre Zutaten…</p>';
        }

        var lines = [
            ["Brot", sel.bread], ["Käse", sel.cheese], ["Fleisch", sel.meat], ["Sauce", sel.sauce],
        ].map(function (pair) {
            return '<div><span class="text-slate-400">' + pair[0] + ':</span> ' +
                   (pair[1] ? pair[1].label : "—") + "</div>";
        });
        lines.push('<div><span class="text-slate-400">Gemüse:</span> ' +
            (sel.vegetables.length ? sel.vegetables.map(function (v) { return v.label; }).join(", ") : "—") + "</div>");
        details.innerHTML = lines.join("");

        var qty = Math.max(1, Number(document.getElementById("quantity").value) || 1);
        document.getElementById("currentPrice").textContent = money(unitPrice(sel) * qty);

        addBtn.disabled = !isComplete(sel);
        document.getElementById("addHint").style.display = isComplete(sel) ? "none" : "";
    }

    // ---- cart -----------------------------------------------------------------
    function renderCart() {
        var list = document.getElementById("cartList");
        var empty = document.getElementById("cartEmpty");
        list.innerHTML = "";
        var total = 0;

        cart.forEach(function (item, i) {
            total += item.unitPrice * item.quantity;
            var li = document.createElement("li");
            li.className = "flex items-start gap-2 rounded-lg bg-slate-50 dark:bg-slate-900/50 p-2";
            li.innerHTML =
                '<div class="flex-1 min-w-0">' +
                    '<div class="font-medium truncate">' + item.summary + "</div>" +
                    '<div class="text-xs text-slate-500">' + money(item.unitPrice) + " × " + item.quantity + "</div>" +
                '</div>' +
                '<div class="font-semibold whitespace-nowrap">' + money(item.unitPrice * item.quantity) + "</div>" +
                '<button type="button" data-remove="' + i + '" aria-label="Entfernen" ' +
                    'class="text-slate-400 hover:text-red-500 px-1">✕</button>';
            list.appendChild(li);
        });

        empty.style.display = cart.length ? "none" : "";
        document.getElementById("cartTotal").textContent = money(total);
        document.getElementById("placeOrder").disabled = cart.length === 0;

        // The server only needs ids + quantity; prices are recomputed server-side.
        document.getElementById("cart").value = JSON.stringify(cart.map(function (item) {
            return {
                bread: item.bread, cheese: item.cheese, meat: item.meat, sauce: item.sauce,
                vegetables: item.vegetables, quantity: item.quantity,
            };
        }));
    }

    function addCurrentToCart() {
        var sel = currentSelection();
        if (!isComplete(sel)) return;
        var qty = Math.max(1, Number(document.getElementById("quantity").value) || 1);

        var summary = [sel.bread.label, sel.meat.label, sel.cheese.label, sel.sauce.label].join(", ");
        if (sel.vegetables.length) summary += " + " + sel.vegetables.map(function (v) { return v.label; }).join(", ");

        cart.push({
            bread: sel.bread.id, cheese: sel.cheese.id, meat: sel.meat.id, sauce: sel.sauce.id,
            vegetables: sel.vegetables.map(function (v) { return v.id; }),
            quantity: qty, unitPrice: unitPrice(sel), summary: summary,
        });

        // Reset the builder for the next sandwich.
        document.querySelectorAll('input[data-group]').forEach(function (el) { el.checked = false; });
        document.getElementById("quantity").value = 1;

        renderCart();
        renderPreview();
    }

    // ---- wiring ---------------------------------------------------------------
    document.querySelectorAll('input[data-group]').forEach(function (el) {
        el.addEventListener("change", renderPreview);
    });
    document.getElementById("quantity").addEventListener("input", renderPreview);
    addBtn.addEventListener("click", addCurrentToCart);
    document.getElementById("cartList").addEventListener("click", function (ev) {
        var btn = ev.target.closest("[data-remove]");
        if (!btn) return;
        cart.splice(Number(btn.dataset.remove), 1);
        renderCart();
    });

    renderPreview();
    renderCart();
})();
