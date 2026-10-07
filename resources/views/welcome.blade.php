<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>
<script src="https://unpkg.com/html5-qrcode"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<head>
    <meta charset="UTF-8">
    <title>نظام ARKA ERP - احترافي</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap');
        :root { --primary: #4f46e5; --bg: #f1f5f9; --card: #ffffff; --text-main: #1e293b; }
        body { font-family: 'Cairo', sans-serif; background-color: var(--bg); margin: 0; display: flex; }
        .sidebar { width: 200px; background-color: #0f172a; color: #fff; height: 100vh; padding: 20px; position: fixed; }
        .sidebar-title { font-size: 22px; font-weight: bold; color: #818cf8; text-align: center; margin-bottom: 30px; }
        .nav-btn { width: 100%; padding: 12px; margin-bottom: 10px; border: none; border-radius: 8px; cursor: pointer; background: transparent; color: #cbd5e1; text-align: right; transition: 0.3s; }
        .nav-btn.active { background-color: var(--primary); color: white; }
        .main-content{ flex: 1; margin-right: 205px; padding: 40px; }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        table { width: 100%; border-collapse: separate; border-spacing: 0 10px; background: #399; }
        th { color: #64748b; padding: 15px; text-transform: uppercase; font-size: 12px; }
        tbody tr { background: var(--card); box-shadow: 0 2px 4px rgba(0,0,0,0.02); transition: 0.3s; }
        tbody tr:hover { transform: translateY(-2px); box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); }
        td { padding: 20px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; }
        .btn-add { background: var(--primary); color: white; padding: 10px 20px; border-radius: 10px; border: none; cursor: pointer; }
        .btn-edit { background: #eff6ff; color: #2563eb; border: none; padding: 8px 16px; border-radius: 8px; cursor: pointer; }
        .btn-delete { background: #fef2f2; color: #dc2626; border: none; padding: 8px 16px; border-radius: 8px; cursor: pointer; margin-right: 5px; }
        .modal { position: fixed; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.5); display: none; justify-content: center; align-items: center; }
        .modal.open { display: flex; }
        .modal-content { background: white; padding: 30px; border-radius: 20px; width: 400px; }
        input, select { width: 100%; padding: 12px; margin: 8px 0; border: 1px solid #ddd; border-radius: 8px; }
        .net-status { text-align: center; font-size: 14px; font-weight: bold; transition: 0.5s; width: 100px; height:20px; margin-bottom:20px; position:absolute; top:20px; left:10px; border-radius:50px; }
        .online { background-color: #d1fae5; color: #065f46; }
        .offline { background-color: #fee2e2; color: #991b1b; }
        .scan-btn { padding:12px 18px; border:none; border-radius:10px; background:#111; color:#fff; font-size:16px; cursor:pointer; }
            .modal { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.7); z-index:9999; justify-content:center; align-items:center; padding:15px; box-sizing:border-box; }
        .modal-box { width:100%; max-width:500px; background:#000; border-radius:16px; padding:15px; box-sizing:border-box; }
        #reader { width:100% !important; overflow:visable; border-radius:12px; }
        #reader video { width:100% !important; height:auto !important; border-radius:12px; }
        .close-btn { width:100%; margin-top:12px; padding:12px; border:none; border-radius:10px; background:red; color:#fff; font-size:16px; cursor:pointer; }
    /* ✅ إضافة: لون الصف حسب حالة الإرسال */
        tr.synced td { border-right: 4px solid #10b981; }
        tr.not-synced td { border-right: 4px solid #f59e0b; }

/* ✅ قسم الموردين + البانل الجانبي للشحنات */
.suppliers-table td, .suppliers-table th { cursor: default; }
.supplier-row { cursor: pointer; }
.side-panel {
    position: fixed; top: 0; left: -420px; width: 380px; height: 100%;
    background: #fff; box-shadow: 2px 0 20px rgba(0,0,0,.15);
    transition: 0.35s; z-index: 1000; padding: 20px; overflow-y: auto; box-sizing: border-box;
}
.side-panel.open { left: 0; }
.side-panel-overlay {
    display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.4); z-index: 999;
}
.side-panel-overlay.open { display: block; }
.shipment-item {
    background: #f8fafc; border-right: 4px solid var(--primary);
    padding: 12px; border-radius: 8px; margin-bottom: 10px;
}
.shipment-item .ship-date { font-size: 12px; color: #64748b; }
.shipment-item .ship-title { font-weight: 700; color: var(--text-main); }


.cards{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:20px;
margin-bottom:30px;
}

.card{
background:#fff;
padding:20px;
border-radius:15px;
box-shadow:0 2px 10px rgba(0,0,0,.1);
text-align:center;
}

.card h1{
margin:10px 0;
color:#4f46e5;
}

.charts{
display:grid;
grid-template-columns:1fr 1fr;
gap:20px;
}

.chart-box{
background:#fff;
padding:20px;
border-radius:15px;
box-shadow:0 2px 10px rgba(0,0,0,.1);
}

#pieChart{
max-height:350px;
}

@media(max-width:900px){
.charts{
grid-template-columns:1fr;
}
}

@media print {
    body * {
        visibility: hidden;
    }

    #printArea,
    #printArea * {
        visibility: visible;
    }

    #printArea {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
    }
}

.printInfo{
    display: none;
}

@media print{
    .printInfo{
        display: block;
        margin-bottom: 15px;
    }
}





</style>

</head>
<body>

    <div class="sidebar">
        <div class="sidebar-title">ARKA ERP</div>
        <button class="nav-btn active" onclick="switchTab('dashboard', this)">لوحة التحكم</button>
        <button class="nav-btn" onclick="switchTab('inventory', this)">إدارة المخازن</button>
        <button class="nav-btn" onclick="switchTab('sells', this)">إدارة المبيعات</button>
        <button class="nav-btn" onclick="switchTab('suppliers', this)">الموردون</button>
    </div>

    <div id="network-bar" class="net-status online">
        <span id="status-text">متصل بالإنترنت</span>
    </div>

    <div class="main-content">

        <div id="dashboard" class="tab-content active">
            <h1>لوحة التحكم</h1>
            <div class="cards">

        <div class="card">
            <h3>📦 إجمالي المنتجات</h3>
            <h1 id="totalProducts">0</h1>
        </div>

        <div class="card">
            <h3>📈 إجمالي المبيعات</h3>
            <h1 id="totalSells">0</h1>
        </div>

        <div class="card">
            <h3>⚠️ منتجات نفدت</h3>
            <h1 id="outStock">0</h1>
        </div>

        <div class="card">
            <h3>🏆 الأكثر مبيعاً</h3>
            <h2 id="bestProduct">---</h2>
        </div>

    </div>

    <div class="charts">

        <div class="chart-box">
            <canvas id="stockChart"></canvas>
        </div>

        <div class="chart-box">
            <canvas id="salesChart"></canvas>
        </div>

        <div class="chart-box">
            <canvas id="pieChart"></canvas>
        </div>

    </div>

        </div>

        <div id="inventory" class="tab-content">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h2>قايمه المنتجات</h2>

                <button onclick="scanOpen()">📷 مسح باركود</button>

<div id="scanModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0); z-index:999;">
  <div style="background:#fff; width:320px; margin:60px auto; padding:16px; border-radius:8px; text-align:center; position:relative;">
    <div id="reader">

    </div>

    <button onclick="scanClose()" style="display:block; width:100%; margin-top:10px;">❌ إغلاق الكاميرا</button>
  </div>
</div>

<audio id="beep" src="https://actions.google.com/sounds/v1/alarms/beep_short.ogg"></audio>

                <button onclick="openModal()" class="btn-add">+ إضافة منتج</button>
                <button id="x">📤 إرسال الجديد</button>
                <button onclick="window.print()">🖨️</button>
            </div>
             <div id="printArea">
            <table>
                <thead><tr><th>كود</th><th>الاسم</th><th>الكمية</th><th>المستودع</th><th>الحالة</th><th>الإجراءات</th></tr></thead>
                <tbody id="inventory-table-body"></tbody>
            </table>
    <div class="printInfo">
       <strong>Date:</strong><span class="printDate"></span><br>
        <strong>Time:</strong> <span class="printTime"></span>
    </div>
            </div>
        </div>

        <div id="sells" class="tab-content">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h2>قائمة المبيعات </h2>

                <button onclick="sellsScanOpen()">📷 مسح باركود</button>

<div id="sellsScanModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0); z-index:999;">
  <div style="background:#fff; width:320px; margin:60px auto; padding:16px; border-radius:8px; text-align:center; position:relative;">
    <div id="sells-reader">

    </div>

    <button onclick="sellsScanClose()" style="display:block; width:100%; margin-top:10px;">❌ إغلاق الكاميرا</button>
  </div>
</div>

<audio id="sells-beep" src="https://actions.google.com/sounds/v1/alarms/beep_short.ogg"></audio>

                <button onclick="sellsOpenModal()" class="btn-add">+ إضافة منتج</button>
                <button id="y">📤 إرسال الجديد</button>
        <button onclick="window.print()">🖨️</button>
            </div>

             <div id="printArea">
            <table>
                <thead><tr><th>كود</th><th>الاسم</th><th>الكمية</th><th>المستودع</th><th>الحالة</th><th>الإجراءات</th></tr></thead>
                <tbody id="sells-table-body"></tbody>
            </table>
                <div class="printInfo">
        <strong>Date:</strong> <span class="printDate"></span><br>
        <strong>Time:</strong> <span class="printTime"></span>
    </div>
            </div>
        </div>

        <!-- ✅ قسم الموردون -->
        <div id="suppliers" class="tab-content">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h2>الموردون</h2>
                <button onclick="SuppliersApp.openModal()" class="btn-add">+ إضافة مورد</button>
            </div>
            <table class="suppliers-table">
                <thead><tr><th>اسم المورد</th><th>رقم التواصل</th><th>عدد الشحنات</th><th>الإجراءات</th></tr></thead>
                <tbody id="suppliers-table-body"></tbody>
            </table>
        </div>

 


    <div id="productModal" class="modal">
        <div class="modal-content">
            <h3 id="modal-title">إضافة منتج جديد</h3>
            <form id="productForm">
                <input type="hidden" id="prod-id">
                <input type="text" id="prod-code" placeholder="كود" maxlength="13" minlength="9">
                <input type="text" id="prod-name" placeholder="اسم المنتج" required>
                <input type="number" id="prod-qty" placeholder="الكمية" required>
                <select id="prod-warehouse">
                    <option>المخزن الرئيسي</option>
                    <option>مخزن الفرع ب</option>
                </select>
                <!-- ✅ سعر الشراء وسعر البيع -->
                <div style="display:flex; gap:8px;">
                    <input type="number" id="prod-purchase-price" placeholder="سعر الشراء" step="0.01" style="flex:1;">
                    <input type="number" id="prod-sale-price" placeholder="سعر البيع" step="0.01" style="flex:1;">
                </div>
                <!-- ✅ اختيار المورد عشان تتسجل الشحنة -->
                <select id="prod-supplier">
                    <option value="">بدون مورد</option>
                </select>
                <div style="display:flex; justify-content: flex-end; gap:10px; margin-top:20px;">
                    <button type="button" onclick="closeModal()">إلغاء</button>
                    <button type="submit" class="btn-add">حفظ</button>
                </div>
            </form>
        </div>
    </div>

    <div id="sellsModal" class="modal">
        <div class="modal-content">
            <h3 id="sells-modal-title">إضافة منتج جديد</h3>
            <form id="sellsForm">
                <input type="hidden" id="sell-id">
                <input type="text" id="sell-code" placeholder="كود" maxlength="13" minlength="9">
                <input type="text" id="sell-name" placeholder="اسم المنتج" required>
                <input type="number" id="sell-qty" placeholder="الكمية" required>
                <select id="sell-warehouse">
                    <option>المخزن الرئيسي</option>
                    <option>مخزن الفرع ب</option>
                </select>
                <!-- ✅ سعر البيع بيتملى تلقائي لما تدخل الكود، بس تقدر تعدله لو محتاج -->
                <input type="number" id="sell-price" placeholder="سعر البيع" step="0.01">
                <div style="display:flex; justify-content: flex-end; gap:10px; margin-top:20px;">
                    <button type="button" onclick="sellsCloseModal()">إلغاء</button>
                    <button type="submit" class="btn-add">حفظ</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ✅ مودال إضافة/تعديل مورد -->
    <div id="supplierModal" class="modal">
        <div class="modal-content">
            <h3 id="supplier-modal-title">إضافة مورد جديد</h3>
            <form id="supplierForm">
                <input type="hidden" id="supplier-id">
                <input type="text" id="supplier-name" placeholder="اسم المورد" required>
                <div style="display:flex; gap:8px; align-items:center;">
                    <input type="text" id="supplier-phone" placeholder="رقم التواصل" required style="flex:1;">
                    <button type="button" onclick="SuppliersApp.openShipmentsModal()"
                        style="white-space:nowrap; background:#0f172a; color:#fff; border:none; border-radius:8px; padding:12px 14px; cursor:pointer; margin:8px 0;">
                        📦 الشحنات
                    </button>
                </div>
                <div style="display:flex; justify-content:flex-end; gap:10px; margin-top:20px;">
                    <button type="button" onclick="SuppliersApp.closeModal()">إلغاء</button>
                    <button type="submit" class="btn-add">حفظ</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ✅ مودال إدارة شحنات المورد (إضافة شحنة بمكوناتها + عرض الشحنات المحفوظة) -->
    <div id="shipmentsModal" class="modal">
        <div class="modal-content" style="width:440px; max-height:85vh; overflow-y:auto;">
            <h3 id="shipments-modal-title">شحنات المورد</h3>

            <div id="shipments-existing-list"></div>

            <hr style="margin:15px 0; border:none; border-top:1px solid #e2e8f0;">

            <h4 id="shipment-form-title" style="margin-bottom:8px;">➕ إضافة شحنة جديدة</h4>
            <div id="new-shipment-items"></div>
            <button type="button" onclick="SuppliersApp.addItemRow()" class="btn-edit" style="width:100%; margin-top:8px;">+ إضافة صنف للشحنة</button>

            <div style="display:flex; justify-content:flex-end; gap:10px; margin-top:20px;">
                <button type="button" id="cancel-edit-shipment-btn" onclick="SuppliersApp.resetShipmentFormMode()" style="display:none;">إلغاء التعديل</button>
                <button type="button" onclick="SuppliersApp.closeShipmentsModal()">إغلاق</button>
                <button type="button" id="save-shipment-btn" onclick="SuppliersApp.saveNewShipment()" class="btn-add">💾 حفظ الشحنة</button>
            </div>
        </div>
    </div>

    <!-- ✅ البانل الجانبي: عرض شحنات المورد (بالضغط على صف المورد في الجدول) -->
    <div id="shipmentOverlay" class="side-panel-overlay" onclick="SuppliersApp.closeShipments()"></div>
    <div id="shipmentPanel" class="side-panel">
        <h3 id="shipment-panel-title">شحنات المورد</h3>
        <div id="shipment-list"></div>
        <button onclick="SuppliersApp.closeShipments()" style="width:100%; margin-top:15px; padding:10px; border-radius:8px; border:none; background:#eee; cursor:pointer;">إغلاق</button>
    </div>

    <script>

// ── DB (المخازن) ───────────────────────────────────────
const DB = {
    get: () => JSON.parse(localStorage.getItem('products') || '[]'),
    save: (data) => localStorage.setItem('products', JSON.stringify(data))
};

// ── DB (المبيعات) ───────────────────────────────────────
const SellsDB = {
    get: () => JSON.parse(localStorage.getItem('sells') || '[]'),
    save: (data) => localStorage.setItem('sells', JSON.stringify(data))
};

// ── DB (الموردين والشحنات) ───────────────────────────────
const SuppliersDB = {
    get: () => JSON.parse(localStorage.getItem('suppliers') || '[]'),
    save: (data) => localStorage.setItem('suppliers', JSON.stringify(data))
};
const ShipmentsDB = {
    get: () => JSON.parse(localStorage.getItem('shipments') || '[]'),
    save: (data) => localStorage.setItem('shipments', JSON.stringify(data))
};

// ── App (المخازن) ───────────────────────────────────────
const App = {
    render: () => {
        const body = document.getElementById('inventory-table-body');

        body.innerHTML = '';
        DB.get().forEach(p => {
            const statusText = p.synced ? '✅ مُرسَل' : '⏳ لم يُرسَل';
            const rowClass = p.synced ? 'synced' : 'not-synced';
            body.innerHTML += `<tr class="${rowClass}">
                <td>${p.code}</td>
                <td>${p.name}</td>
                <td>${p.qty}</td>
                <td>${p.warehouse}</td>
                <td>${statusText}</td>
                <td>
                    <button onclick="App.edit(${p.id})">تعديل</button>
                    <button onclick="App.del(${p.id})">حذف</button>
                </td>
            </tr>`;
        });
    },

    saveProduct: (e) => {
        e.preventDefault();
        const id = document.getElementById('prod-id').value;
        let list = DB.get();
        const existing = id ? list.find(i => i.id == id) : null;

        const p = {
            id: id ? Number(id) : Date.now(),
            code: document.getElementById('prod-code').value,
            name: document.getElementById('prod-name').value,
            qty: document.getElementById('prod-qty').value,
            warehouse: document.getElementById('prod-warehouse').value,
            purchasePrice: document.getElementById('prod-purchase-price').value || 0, // ✅ سعر الشراء
            salePrice: document.getElementById('prod-sale-price').value || 0,          // ✅ سعر البيع (بيترفع مع باقي البيانات في المزامنة)
            synced: existing ? existing.synced : false,
            serverId: existing ? existing.serverId : null,
            syncedQty: existing ? existing.syncedQty : 0  // ✅ الكمية اللي اتبعتت للسيرفر
        };

        // ✅ سجّل شحنة جديدة لو تم اختيار مورد، وسعر الشراء بيتسجل تلقائي مع الصنف
        const supplierId = document.getElementById('prod-supplier') ? document.getElementById('prod-supplier').value : '';
        SuppliersApp.logShipment({
            code: p.code, name: p.name, qty: p.qty,
            warehouse: p.warehouse, price: p.purchasePrice, supplierId
        });

        // ✅ لو منتج جديد (مش edit)، ابحث عن مطابق تام
        if (!id) {
            const duplicate = list.find(i =>
                i.code === p.code &&
                i.name === p.name &&
                i.warehouse === p.warehouse
            );

            if (duplicate) {
                // زوّد الكمية الإجمالية بس syncedQty مش بتتغير
                duplicate.qty = String(Number(duplicate.qty) + Number(p.qty));
                duplicate.synced = false;
                // ✅ حدّث سعر الشراء والبيع لو المستخدم كتب قيمة جديدة (لو سايبها فاضية يفضل السعر القديم)
                if (p.purchasePrice) duplicate.purchasePrice = p.purchasePrice;
                if (p.salePrice) duplicate.salePrice = p.salePrice;
                DB.save(list);
                closeModal();
                App.render();
                return;
            }
        }

        list = id ? list.map(i => i.id == id ? p : i) : [...list, p];
        DB.save(list);
        closeModal();
        App.render();
    },

    edit: (id) => {
        const p = DB.get().find(i => i.id == id);
        document.getElementById('prod-id').value = p.id;
        document.getElementById('prod-code').value = p.code;
        document.getElementById('prod-name').value = p.name;
        document.getElementById('prod-qty').value = p.qty;
        document.getElementById('prod-warehouse').value = p.warehouse;
        document.getElementById('prod-purchase-price').value = p.purchasePrice || '';
        document.getElementById('prod-sale-price').value = p.salePrice || '';
        document.getElementById('modal-title').innerText = "تعديل البيانات";
        document.getElementById('productModal').classList.add('open');
    },

    del: (id) => {
        if (confirm('متأكد؟')) { DB.save(DB.get().filter(p => p.id != id)); App.render(); }
    }
};

// ── App (المبيعات) ───────────────────────────────────────
const SellsApp = {
    render: () => {
        const body = document.getElementById('sells-table-body');

        body.innerHTML = '';
        SellsDB.get().forEach(p => {
            const statusText = p.synced ? '✅ مُرسَل' : '⏳ لم يُرسَل';
            const rowClass = p.synced ? 'synced' : 'not-synced';
            body.innerHTML += `<tr class="${rowClass}">
                <td>${p.code}</td>
                <td>${p.name}</td>
                <td>${p.qty}</td>
                <td>${p.warehouse}</td>
                <td>${statusText}</td>
                <td>
                    <button onclick="SellsApp.edit(${p.id})">تعديل</button>
                    <button onclick="SellsApp.del(${p.id})">حذف</button>
                </td>
            </tr>`;
        });
    },

    saveSell: (e) => {
        e.preventDefault();
        const id = document.getElementById('sell-id').value;
        let list = SellsDB.get();
        const existing = id ? list.find(i => i.id == id) : null;

        const p = {
            id: id ? Number(id) : Date.now(),
            code: document.getElementById('sell-code').value,
            name: document.getElementById('sell-name').value,
            qty: document.getElementById('sell-qty').value,
            warehouse: document.getElementById('sell-warehouse').value,
            price: document.getElementById('sell-price').value || 0, // ✅ سعر البيع وقت العملية
            synced: existing ? existing.synced : false,
            serverId: existing ? existing.serverId : null,
            syncedQty: existing ? existing.syncedQty : 0  // ✅ الكمية اللي اتبعتت للسيرفر
        };

        // ✅ لو عملية بيع جديدة (مش edit)، ابحث عن مطابق تام

        list = id ? list.map(i => i.id == id ? p : i) : [...list, p];
        SellsDB.save(list);
        sellsCloseModal();
        SellsApp.render();
    },

    edit: (id) => {
        const p = SellsDB.get().find(i => i.id == id);
        document.getElementById('sell-id').value = p.id;
        document.getElementById('sell-code').value = p.code;
        document.getElementById('sell-name').value = p.name;
        document.getElementById('sell-qty').value = p.qty;
        document.getElementById('sell-warehouse').value = p.warehouse;
        document.getElementById('sell-price').value = p.price || '';
        document.getElementById('sells-modal-title').innerText = "تعديل البيانات";
        document.getElementById('sellsModal').classList.add('open');
    },

    del: (id) => {
        if (confirm('متأكد؟')) { SellsDB.save(SellsDB.get().filter(p => p.id != id)); SellsApp.render(); }
    }
};

// ── App (الموردين) ───────────────────────────────────────
// ملحوظة عن شكل بيانات الشحنة:
// كل شحنة = { id, supplierId, date, items: [ {name, qty, code?, warehouse?} , ... ] }
// يعني الشحنة الواحدة ممكن يكون فيها أكتر من صنف/منتج جوّاها.

let currentShipmentSupplierId = null; // المورد اللي بنضيفله شحنة دلوقتي
let currentEditingShipmentId = null;   // ✅ الشحنة اللي بيتم تعديلها دلوقتي (لو null يبقى إضافة جديدة)
let itemRowCount = 0;

const SuppliersApp = {
    render: () => {
        const body = document.getElementById('suppliers-table-body');
        const shipments = ShipmentsDB.get();
        body.innerHTML = '';
        SuppliersDB.get().forEach(s => {
            const count = shipments.filter(sh => sh.supplierId == s.id).length;
            body.innerHTML += `<tr class="supplier-row" onclick="SuppliersApp.openShipments(${s.id})">
                <td>${s.name}</td>
                <td>${s.phone}</td>
                <td>${count}</td>
                <td onclick="event.stopPropagation()">
                    <button class="btn-edit" onclick="SuppliersApp.edit(${s.id})">تعديل</button>
                    <button class="btn-delete" onclick="SuppliersApp.del(${s.id})">حذف</button>
                </td>
            </tr>`;
        });
        SuppliersApp.fillSelect();
    },

    // يملى الـ select بتاع المورد في فورم المنتج
    fillSelect: () => {
        const sel = document.getElementById('prod-supplier');
        if (!sel) return;
        const current = sel.value;
        sel.innerHTML = '<option value="">بدون مورد</option>';
        SuppliersDB.get().forEach(s => {
            sel.innerHTML += `<option value="${s.id}">${s.name}</option>`;
        });
        sel.value = current;
    },

    saveSupplier: (e) => {
        e.preventDefault();
        const id = document.getElementById('supplier-id').value || Date.now();
        let list = SuppliersDB.get();
        const s = {
            id: Number(id),
            name: document.getElementById('supplier-name').value,
            phone: document.getElementById('supplier-phone').value
        };
        const idx = list.findIndex(i => i.id == id);
        list = idx >= 0 ? list.map(i => i.id == id ? s : i) : [...list, s];
        SuppliersDB.save(list);
        SuppliersApp.closeModal();
        SuppliersApp.render();
    },

    edit: (id) => {
        const s = SuppliersDB.get().find(i => i.id == id);
        document.getElementById('supplier-id').value = s.id;
        document.getElementById('supplier-name').value = s.name;
        document.getElementById('supplier-phone').value = s.phone;
        document.getElementById('supplier-modal-title').innerText = "تعديل المورد";
        document.getElementById('supplierModal').classList.add('open');
    },

    del: (id) => {
        if (confirm('متأكد؟ هيتم حذف المورد وسجل شحناته من العرض')) {
            SuppliersDB.save(SuppliersDB.get().filter(s => s.id != id));
            ShipmentsDB.save(ShipmentsDB.get().filter(sh => sh.supplierId != id)); // ✅ نضّف شحنات المورد المحذوف كمان
            SuppliersApp.render();
        }
    },

    openModal: () => document.getElementById('supplierModal').classList.add('open'),
    closeModal: () => {
        document.getElementById('supplierModal').classList.remove('open');
        document.getElementById('supplierForm').reset();
        document.getElementById('supplier-id').value = '';
        document.getElementById('supplier-modal-title').innerText = "إضافة مورد جديد";
    },

    // ✅ فتح مودال "الشحنات" جمب رقم التليفون داخل مودال المورد
    // بيحفظ اسم/رقم المورد الحاليين فوراً (حتى لو لسه ماحفظتش) عشان الشحنة تتربط بمورد حقيقي
    openShipmentsModal: () => {
        let id = document.getElementById('supplier-id').value;
        if (!id) {
            id = Date.now();
            document.getElementById('supplier-id').value = id;
        }
        const name = document.getElementById('supplier-name').value.trim();
        const phone = document.getElementById('supplier-phone').value.trim();

        if (name || phone) {
            let list = SuppliersDB.get();
            const idx = list.findIndex(s => s.id == id);
            const supplierObj = { id: Number(id), name: name || '(بدون اسم بعد)', phone: phone || '' };
            if (idx >= 0) list[idx] = supplierObj; else list.push(supplierObj);
            SuppliersDB.save(list);
        }

        currentShipmentSupplierId = Number(id);
        const supplier = SuppliersDB.get().find(s => s.id == id);
        document.getElementById('shipments-modal-title').innerText = `شحنات: ${supplier ? supplier.name : ''}`;

        // ابدأ فورم شحنة جديدة بصف واحد فاضي (مش في وضع تعديل)
        SuppliersApp.resetShipmentFormMode();

        SuppliersApp.renderExistingShipments();
        document.getElementById('shipmentsModal').classList.add('open');
        SuppliersApp.render();
    },

    closeShipmentsModal: () => {
        document.getElementById('shipmentsModal').classList.remove('open');
    },

    // يعرض الشحنات المحفوظة فعلاً لهذا المورد جوّه مودال الشحنات
    renderExistingShipments: () => {
        const container = document.getElementById('shipments-existing-list');
        const list = ShipmentsDB.get()
            .filter(sh => sh.supplierId == currentShipmentSupplierId)
            .sort((a, b) => new Date(a.date) - new Date(b.date));

        if (!list.length) {
            container.innerHTML = '<p style="color:#94a3b8;">لا توجد شحنات مسجلة لهذا المورد بعد.</p>';
            return;
        }

        container.innerHTML = list.map((sh, idx) => {
            const num = ['الأولى','الثانية','الثالثة','الرابعة','الخامسة','السادسة','السابعة'][idx] || `رقم ${idx+1}`;
            const d = new Date(sh.date);
            const total = (sh.items || []).reduce((sum, it) => sum + (Number(it.price || 0) * Number(it.qty || 0)), 0);
            const itemsHtml = (sh.items || []).map(it =>
                `<div style="font-size:13px; color:#334155;">• ${it.name} × ${it.qty}${it.warehouse ? ' — ' + it.warehouse : ''}${it.price ? ' — 💰 ' + it.price + ' ج.م للوحدة' : ''}</div>`
            ).join('');
            return `<div class="shipment-item">
                <div class="ship-title">الشحنة ${num}</div>
                <div class="ship-date">📅 ${d.toLocaleDateString('ar-EG')} — ${d.toLocaleTimeString('ar-EG')}</div>
                ${itemsHtml}
                ${total > 0 ? `<div style="font-size:13px; font-weight:700; color:#4f46e5; margin-top:4px;">الإجمالي: ${total.toFixed(2)} ج.م</div>` : ''}
                <div style="display:flex; gap:6px; margin-top:6px;">
                    <button class="btn-edit" onclick="SuppliersApp.editShipment(${sh.id})">✏️ تعديل</button>
                    <button class="btn-delete" onclick="SuppliersApp.deleteShipment(${sh.id})">حذف</button>
                </div>
            </div>`;
        }).join('');
    },

    // يضيف صف جديد لإدخال صنف داخل الشحنة الجديدة (اسم + كمية + سعر)
    addItemRow: () => {
        itemRowCount++;
        const rowId = 'item-row-' + itemRowCount;
        const container = document.getElementById('new-shipment-items');
        const row = document.createElement('div');
        row.id = rowId;
        row.style.display = 'flex';
        row.style.gap = '6px';
        row.style.marginBottom = '6px';
        row.innerHTML = `
            <input type="text" placeholder="اسم المنتج" class="ship-item-name" style="flex:2;">
            <input type="number" placeholder="الكمية" class="ship-item-qty" style="flex:1;">
            <input type="number" placeholder="السعر" step="0.01" class="ship-item-price" style="flex:1;">
            <button type="button" onclick="document.getElementById('${rowId}').remove()"
                style="background:#fef2f2; color:#dc2626; border:none; border-radius:8px; padding:0 12px; cursor:pointer;">✕</button>
        `;
        container.appendChild(row);
    },

    // يحفظ الشحنة: لو في وضع تعديل (currentEditingShipmentId موجود) بيحدّث الشحنة الموجودة،
    // ولو مش في وضع تعديل بيضيف شحنة جديدة مرتبطة بالمورد الحالي
    saveNewShipment: () => {
        const rows = document.querySelectorAll('#new-shipment-items > div');
        const items = [];
        rows.forEach(row => {
            const name = row.querySelector('.ship-item-name').value.trim();
            const qty = row.querySelector('.ship-item-qty').value;
            const price = row.querySelector('.ship-item-price').value;
            if (name && qty) items.push({ name, qty, price: price || 0 });
        });

        if (!items.length) { alert('من فضلك ادخل صنف واحد على الأقل بالاسم والكمية'); return; }
        if (!currentShipmentSupplierId) { alert('حدث خطأ، حاول تفتح الشحنات تاني'); return; }

        const shipments = ShipmentsDB.get();

        if (currentEditingShipmentId) {
            // ✅ وضع التعديل: حدّث الشحنة الموجودة بدل ما تضيف واحدة جديدة (التاريخ الأصلي بيفضل زي ما هو)
            const idx = shipments.findIndex(sh => sh.id == currentEditingShipmentId);
            if (idx >= 0) {
                shipments[idx] = { ...shipments[idx], items };
            }
            ShipmentsDB.save(shipments);
            SuppliersApp.resetShipmentFormMode();
            SuppliersApp.renderExistingShipments();
            SuppliersApp.render();
            alert('✅ تم تعديل الشحنة بنجاح');
        } else {
            // إضافة شحنة جديدة
            shipments.push({
                id: Date.now() + Math.random(),
                supplierId: currentShipmentSupplierId,
                date: new Date().toISOString(),
                items
            });
            ShipmentsDB.save(shipments);

            // ✅ فضّي الفورم واستعد لإضافة شحنة تانية، والقايمة المحفوظة فوق بتتحدث فورًا
            document.getElementById('new-shipment-items').innerHTML = '';
            itemRowCount = 0;
            SuppliersApp.addItemRow();
            SuppliersApp.renderExistingShipments();
            SuppliersApp.render();
            alert('✅ تم حفظ الشحنة، تقدر تضيف شحنة جديدة تانية دلوقتي');
        }
    },

    // ✅ يحمّل بيانات شحنة موجودة في الفورم عشان تتعدل
    editShipment: (id) => {
        const shipment = ShipmentsDB.get().find(sh => sh.id == id);
        if (!shipment) return;

        currentEditingShipmentId = id;

        const container = document.getElementById('new-shipment-items');
        container.innerHTML = '';
        itemRowCount = 0;
        (shipment.items || []).forEach(it => {
            SuppliersApp.addItemRow();
            const row = document.getElementById('item-row-' + itemRowCount);
            row.querySelector('.ship-item-name').value = it.name || '';
            row.querySelector('.ship-item-qty').value = it.qty || '';
            row.querySelector('.ship-item-price').value = it.price || '';
        });
        if (!shipment.items || !shipment.items.length) SuppliersApp.addItemRow();

        document.getElementById('shipment-form-title').innerText = '✏️ تعديل الشحنة';
        document.getElementById('save-shipment-btn').innerText = '💾 حفظ التعديل';
        document.getElementById('cancel-edit-shipment-btn').style.display = 'inline-block';

        // نزّل لفورم التعديل عشان يبان
        document.getElementById('shipment-form-title').scrollIntoView({ behavior: 'smooth' });
    },

    // يرجّع الفورم لوضع "إضافة شحنة جديدة" العادي
    resetShipmentFormMode: () => {
        currentEditingShipmentId = null;
        document.getElementById('new-shipment-items').innerHTML = '';
        itemRowCount = 0;
        SuppliersApp.addItemRow();
        document.getElementById('shipment-form-title').innerText = '➕ إضافة شحنة جديدة';
        document.getElementById('save-shipment-btn').innerText = '💾 حفظ الشحنة';
        document.getElementById('cancel-edit-shipment-btn').style.display = 'none';
    },

    deleteShipment: (id) => {
        if (!confirm('حذف هذه الشحنة؟')) return;
        ShipmentsDB.save(ShipmentsDB.get().filter(sh => sh.id != id));
        if (currentEditingShipmentId == id) SuppliersApp.resetShipmentFormMode(); // ✅ لو كانت الشحنة دي بتتعدل وقت الحذف
        SuppliersApp.renderExistingShipments();
        SuppliersApp.render();
    },

    // ✅ فتح البانل الجانبي (بالضغط على صف المورد في الجدول) وعرض شحناته مرتبة بالتاريخ
    openShipments: (supplierId) => {
        const supplier = SuppliersDB.get().find(s => s.id == supplierId);
        const list = ShipmentsDB.get()
            .filter(sh => sh.supplierId == supplierId)
            .sort((a, b) => new Date(a.date) - new Date(b.date));

        document.getElementById('shipment-panel-title').innerText = `شحنات: ${supplier ? supplier.name : ''}`;
        const container = document.getElementById('shipment-list');

        if (!list.length) {
            container.innerHTML = '<p>لا توجد شحنات مسجلة لهذا المورد بعد.</p>';
        } else {
            container.innerHTML = list.map((sh, idx) => {
                const num = ['الأولى','الثانية','الثالثة','الرابعة','الخامسة','السادسة','السابعة'][idx] || `رقم ${idx+1}`;
                const d = new Date(sh.date);
                const total = (sh.items || []).reduce((sum, it) => sum + (Number(it.price || 0) * Number(it.qty || 0)), 0);
                const itemsHtml = (sh.items || []).map(it =>
                    `<div style="font-size:13px; color:#334155;">• ${it.name} × ${it.qty}${it.warehouse ? ' — ' + it.warehouse : ''}${it.price ? ' — 💰 ' + it.price + ' ج.م للوحدة' : ''}</div>`
                ).join('');
                return `<div class="shipment-item">
                    <div class="ship-title">الشحنة ${num}</div>
                    <div class="ship-date">📅 ${d.toLocaleDateString('ar-EG')} — ${d.toLocaleTimeString('ar-EG')}</div>
                    ${itemsHtml}
                    ${total > 0 ? `<div style="font-size:13px; font-weight:700; color:#4f46e5; margin-top:4px;">الإجمالي: ${total.toFixed(2)} ج.م</div>` : ''}
                </div>`;
            }).join('');
        }

        document.getElementById('shipmentPanel').classList.add('open');
        document.getElementById('shipmentOverlay').classList.add('open');
    },

    closeShipments: () => {
        document.getElementById('shipmentPanel').classList.remove('open');
        document.getElementById('shipmentOverlay').classList.remove('open');
    },

    // يسجل شحنة تلقائياً (بصنف واحد) كل مرة يتضاف/يتزود فيها منتج بمورد محدد من شاشة المخزون
    logShipment: ({ code, name, qty, warehouse, price, supplierId }) => {
        if (!supplierId) return;
        const shipments = ShipmentsDB.get();
        shipments.push({
            id: Date.now() + Math.random(),
            supplierId: Number(supplierId),
            date: new Date().toISOString(),
            items: [{ code, name, qty, warehouse, price: price || 0 }]
        });
        ShipmentsDB.save(shipments);
    }
};

// ── Modal (المخازن) ──────────────────────────────────────
function openModal() {
    document.getElementById('productModal').classList.add('open');
}
function closeModal() {
    document.getElementById('productModal').classList.remove('open');
    document.getElementById('productForm').reset();
    document.getElementById('prod-id').value = '';
    document.getElementById('modal-title').innerText = "إضافة منتج جديد";
}

// ── Modal (المبيعات) ──────────────────────────────────────
function sellsOpenModal() {
    document.getElementById('sellsModal').classList.add('open');
}
function sellsCloseModal() {
    document.getElementById('sellsModal').classList.remove('open');
    document.getElementById('sellsForm').reset();
    document.getElementById('sell-id').value = '';
    document.getElementById('sells-modal-title').innerText = "إضافة منتج جديد";
}

// ── Scanner (المخازن) ────────────────────────────────────
let scanner = null, scanning = false, canScan = true;

async function scanOpen() {
    document.getElementById("scanModal").style.display = "block";
    if (scanning) return;
    await new Promise(r => setTimeout(r, 300));
    try {
        await navigator.mediaDevices.getUserMedia({ video: true });
        scanner = new Html5Qrcode("reader");
        const cams = await Html5Qrcode.getCameras();
        if (!cams || cams.length === 0) { alert("لا توجد كاميرا"); return; }
        const cam = cams.find(c => /back|rear|environment/i.test(c.label)) || cams[cams.length - 1];
        await scanner.start(
            { deviceId: { exact: cam.id } },
            { fps: 10, qrbox: { width: 200, height: 200 } },
            onScan
        );
        scanning = true;
    } catch(err) {
        console.error(err);
        if (err.name === "NotAllowedError") alert("اسمح باستخدام الكاميرا من المتصفح");
        else if (err.name === "NotFoundError") alert("لا توجد كاميرا متاحة");
        else alert("خطأ: " + err.message);
        scanning = false;
        document.getElementById("scanModal").style.display = "none";
    }
}

async function scanClose() {
    try {
        if (scanner && scanning) { await scanner.stop(); scanner.clear(); }
    } catch(e) {}
    scanner = null;
    scanning = false;
    document.getElementById("reader").innerHTML = "";
    document.getElementById("scanModal").style.display = "none";
}

// ── Scanner (المبيعات) ────────────────────────────────────
let sellsScanner = null, sellsScanning = false, sellsCanScan = true;

async function sellsScanOpen() {
    document.getElementById("sellsScanModal").style.display = "block";
    if (sellsScanning) return;
    await new Promise(r => setTimeout(r, 300));
    try {
        await navigator.mediaDevices.getUserMedia({ video: true });
        sellsScanner = new Html5Qrcode("sells-reader");
        const cams = await Html5Qrcode.getCameras();
        if (!cams || cams.length === 0) { alert("لا توجد كاميرا"); return; }
        const cam = cams.find(c => /back|rear|environment/i.test(c.label)) || cams[cams.length - 1];
        await sellsScanner.start(
            { deviceId: { exact: cam.id } },
            { fps: 10, qrbox: { width: 200, height: 200 } },
            sellsOnScan
        );
        sellsScanning = true;
    } catch(err) {
        console.error(err);
        if (err.name === "NotAllowedError") alert("اسمح باستخدام الكاميرا من المتصفح");
        else if (err.name === "NotFoundError") alert("لا توجد كاميرا متاحة");
        else alert("خطأ: " + err.message);
        sellsScanning = false;
        document.getElementById("sellsScanModal").style.display = "none";
    }
}

async function sellsScanClose() {
    try {
        if (sellsScanner && sellsScanning) { await sellsScanner.stop(); sellsScanner.clear(); }
    } catch(e) {}
    sellsScanner = null;
    sellsScanning = false;
    document.getElementById("sells-reader").innerHTML = "";
    document.getElementById("sellsScanModal").style.display = "none";
}

// ── Network ──────────────────────────────────────────────
function updateStatus() {
    const online = navigator.onLine;
    document.getElementById('network-bar').className = "net-status " + (online ? "online" : "offline");
    document.getElementById('status-text').innerText = online ? "متصل" : "(غير متصل)";
}
window.addEventListener('online', updateStatus);
window.addEventListener('offline', updateStatus);

// ── Sync (المخازن) ✅ مع دعم Delta ────────────────────────
document.getElementById("x").onclick = async () => {
    let allProducts = DB.get();

    // ✅ المنتجات اللي عندها كمية لم تُرسَل بعد (delta > 0)
    let toSync = allProducts.filter(p => {
        const delta = Number(p.qty) - Number(p.syncedQty || 0);
        return delta > 0;
    });

    if (!navigator.onLine) { alert("غير متصل بالإنترنت"); return; }
    if (!toSync.length) { alert("لا توجد منتجات جديدة للإرسال"); return; }

    // ✅ ابعت الـ delta لكل منتج مش الإجمالي
    const payload = toSync.map(p => ({
        ...p,
        qty: Number(p.qty) - Number(p.syncedQty || 0)  // الفرق فقط
    }));

    try {
        let r = await fetch("/Sync.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ products: payload })
        });
        let d = await r.json();

        if (d.status) {
            // ✅ بعد الإرسال: syncedQty = qty الحالية، وsynced = true
            let updated = allProducts.map(p => {
                const delta = Number(p.qty) - Number(p.syncedQty || 0);
                if (delta > 0) {
                    return { ...p, synced: true, syncedQty: Number(p.qty) };
                }
                return p;
            });
            DB.save(updated);
            App.render();
            alert(`✅ تم إرسال ${toSync.length} منتج بنجاح`);
        }
    } catch(err) {
        alert("فشل الإرسال: " + err.message);
    }
};

// ── Sync (المبيعات) ✅ مع دعم Delta ────────────────────────
document.getElementById("y").onclick = async () => {
    let allSells = SellsDB.get();

    // ✅ العمليات اللي عندها كمية لم تُرسَل بعد (delta > 0)
    let toSync = allSells.filter(p => {
        const delta = Number(p.qty) - Number(p.syncedQty || 0);
        return delta > 0;
    });

    if (!navigator.onLine) { alert("غير متصل بالإنترنت"); return; }
    if (!toSync.length) { alert("لا توجد عمليات بيع جديدة للإرسال"); return; }

    // ✅ ابعت الـ delta لكل عملية مش الإجمالي
    const payload = toSync.map(p => ({
        ...p,
        qty: Number(p.qty) - Number(p.syncedQty || 0)  // الفرق فقط
    }));

    try {
        let r = await fetch("/SyncSells.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ sells: payload })
        });
        let d = await r.json();

        if (d.status) {
            // ✅ بعد الإرسال: syncedQty = qty الحالية، وsynced = true
            let updated = allSells.map(p => {
                const delta = Number(p.qty) - Number(p.syncedQty || 0);
                if (delta > 0) {
                    return { ...p, synced: true, syncedQty: Number(p.qty) };
                }
                return p;
            });
            SellsDB.save(updated);
            SellsApp.render();
            alert(`✅ تم إرسال ${toSync.length} عملية بيع بنجاح`);
        }
    } catch(err) {
        alert("فشل الإرسال: " + err.message);
    }
};

// ── Tabs ─────────────────────────────────────────────────
function switchTab(tabId, btn) {
    document.querySelectorAll('.tab-content').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.nav-btn').forEach(b => b.classList.remove('active'));
    document.getElementById(tabId).classList.add('active');
    btn.classList.add('active');
}

// ── Init ─────────────────────────────────────────────────
document.getElementById('productForm').onsubmit = App.saveProduct;
document.getElementById('sellsForm').onsubmit = SellsApp.saveSell;
document.getElementById('supplierForm').onsubmit = SuppliersApp.saveSupplier;
window.onload = () => { App.render(); SellsApp.render(); SuppliersApp.render(); updateStatus(); };

// ── onScan (المخازن) ──────────────────────────────────────
async function onScan(barcode) {
    if (!canScan) return;
    canScan = false;
    document.getElementById("beep").play().catch(() => {});
    document.getElementById("prod-id").value = "";
    document.getElementById("prod-code").value = barcode;
    document.getElementById("prod-name").value = "";
    document.getElementById("prod-qty").value = "";
    document.getElementById("prod-warehouse").selectedIndex = 0;
    document.getElementById("modal-title").innerText = "إضافة منتج جديد";
    document.getElementById("productModal").classList.add("open");
    setTimeout(() => canScan = true, 2000);
}

// ── onScan (المبيعات) ──────────────────────────────────────
async function sellsOnScan(barcode) {
    if (!sellsCanScan) return;
    sellsCanScan = false;
    document.getElementById("sells-beep").play().catch(() => {});
    document.getElementById("sell-id").value = "";
    document.getElementById("sell-code").value = barcode;
    document.getElementById("sell-name").value = "";
    document.getElementById("sell-qty").value = "";
    document.getElementById("sell-warehouse").selectedIndex = 0;
    document.getElementById("sells-modal-title").innerText = "إضافة منتج جديد";
    document.getElementById("sellsModal").classList.add("open");
    setTimeout(() => sellsCanScan = true, 2000);
}

// ─────────────────────────────────────────────
// تعبئة بيانات المنتج تلقائياً عند إدخال الكود
// يبحث أولاً في products ثم في sells
// ─────────────────────────────────────────────

function autoFillSellProduct() {
    const code = document.getElementById("sell-code").value.trim();
    if (!code) return;

    // البحث في المخازن أولاً
    let product = DB.get().find(p => p.code === code);

    // لو مش موجود ابحث في المبيعات
    if (!product) {
        product = SellsDB.get().find(p => p.code === code);
    }

    // لو لقى المنتج
    if (product) {
        document.getElementById("sell-name").value = product.name;
        document.getElementById("sell-warehouse").value = product.warehouse;
        // ✅ سعر البيع: لو المنتج جاي من المخزون بيبقى اسمه salePrice، ولو جاي من سجل مبيعات قديم بيبقى اسمه price
        document.getElementById("sell-price").value = product.salePrice || product.price || '';

        // امسح الكمية علشان المستخدم يدخل الكمية المباعة
        document.getElementById("sell-qty").value = "";
    }
}

// يشتغل أثناء الكتابة
document.getElementById("sell-code").addEventListener("input", autoFillSellProduct);

// ويشتغل لو الباركود اتحط برمجياً
const oldSellsOnScan = sellsOnScan;
sellsOnScan = async function(barcode){
    await oldSellsOnScan(barcode);
    autoFillSellProduct();
};

let stockChart = null;
let salesChart = null;
let pieChart = null;

async function loadDashboard() {

    const r = await fetch("/dashboard_data.php");
    const d = await r.json();

    // بطاقات الإحصائيات
    document.getElementById("totalProducts").innerText = d.products.length;

    let totalSell = 0;
    d.sells.forEach(i => totalSell += Number(i.qty));
    document.getElementById("totalSells").innerText = totalSell;

    let out = d.products.filter(i => Number(i.qty) <= 0).length;
    document.getElementById("outStock").innerText = out;

    let best = "---";
    let max = 0;

    d.sells.forEach(i => {
        if (Number(i.qty) > max) {
            max = Number(i.qty);
            best = i.name;
        }
    });

    document.getElementById("bestProduct").innerText = best;

    // بيانات المخزون
    const stockNames = d.products.map(i => i.name);
    const stockQty = d.products.map(i => Number(i.qty));

    // بيانات المبيعات
    const sellNames = d.sells.map(i => i.name);
    const sellQty = d.sells.map(i => Number(i.qty));

    if (stockChart) stockChart.destroy();
    if (salesChart) salesChart.destroy();
    if (pieChart) pieChart.destroy();

    stockChart = new Chart(document.getElementById("stockChart"),{
        type:"bar",
        data:{
            labels:stockNames,
            datasets:[{
                label:"المخزون",
                data:stockQty
            }]
        }
    });

    salesChart = new Chart(document.getElementById("salesChart"),{
        type:"bar",
        data:{
            labels:sellNames,
            datasets:[{
                label:"المبيعات",
                data:sellQty
            }]
        }
    });

    pieChart = new Chart(document.getElementById("pieChart"),{
        type:"pie",
        data:{
            labels:sellNames,
            datasets:[{
                data:sellQty
            }]
        }
    });

}

// أول تشغيل
loadDashboard();

// تحديث كل 5 ثوان
setInterval(loadDashboard,5000);

window.addEventListener("beforeprint", () => {
    const now = new Date();

    document.querySelectorAll(".printDate").forEach(e => {
        e.textContent = now.toLocaleDateString("ar-EG");
    });

    document.querySelectorAll(".printTime").forEach(e => {
        e.textContent = now.toLocaleTimeString("ar-EG");
    });
});


    </script>
</body>
</html>





