'''-----------------------------------------------------
Assignment 1
Question: Optimizing Social Media Content Distribution
Written by:
                محمد اسامه فيصل القواسمه 2022901100

عبيده محمد الحواري 2021901155
----------------------------------------------------- '''
import numpy as np
import matplotlib.pyplot as plt

# تعريف دالة التفاعل
def engagement_score(schedule, w1, w2, w3, w4, likes, shares, comments, time_spent):
    """حساب درجة التفاعل مع المنشورات التي يتم عرضها بناءً على الجدول المحدد."""
    engagement = (w1 * np.sum(likes[schedule]) + 
                  w2 * np.sum(shares[schedule]) + 
                  w3 * np.sum(comments[schedule]) + 
                  w4 * np.sum(time_spent[schedule]))
    return engagement

# دالة لتحويل الرقم إلى أوقات بالساعات
def particle_to_time(particle, start_hour=8, end_hour=22):
    """تحويل الرقم إلى أوقات بالساعات."""
    total_minutes = (end_hour - start_hour) * 60  # عدد الدقائق بين 8 صباحًا و 10 مساءً
    times = []
    for value in particle:
        minutes = int((value / 100) * total_minutes)  # تحويل المؤشر إلى دقائق
        hour = start_hour + minutes // 60  # حساب الساعة
        minute = minutes % 60  # حساب الدقائق
        times.append(f"{hour:02d}:{minute:02d}")
    return times

# دالة PSO لتحسين اوقات عرض المحتوى لتحقيق اطول وقت من العرض
def pso_engagement(dimensions, swarm_size, max_iter, w, c1, c2, likes, shares, comments, time_spent):
    swarm = np.random.randint(0, len(likes), (swarm_size, dimensions))
   # print(swarm)
    velocity = np.zeros((swarm_size, dimensions))
   # print(velocity)
    pbest = swarm.copy()
    pbest_fitness = np.array([engagement_score(p, 0.5, 0.1, 0.3, 0.1, likes, shares, comments, time_spent) for p in pbest])
    gbest_index = np.argmax(pbest_fitness)
   # print(gbest_index)
    gbest = pbest[gbest_index].copy()
 #   print(gbest)

    convergence_curve = []

    for iteration in range(1, max_iter + 1):
        r1, r2 = np.random.rand(swarm_size, dimensions), np.random.rand(swarm_size, dimensions)
        velocity = w * velocity + c1 * r1 * (pbest - swarm) + c2 * r2 * (gbest - swarm)
        swarm = swarm + velocity.astype(int)
        
        # تقييد القيم ضمن النطاق الصحيح
        swarm = np.clip(swarm, 0, len(likes) - 1)

        fitness = np.array([engagement_score(p, 0.5, 0.1, 0.3, 0.1, likes, shares, comments, time_spent) for p in swarm])

        for i in range(swarm_size):
            if fitness[i] > pbest_fitness[i]:  # نريد زيادة التفاعل، لذا نبحث عن أكبر قيمة
                pbest[i] = swarm[i].copy()
                pbest_fitness[i] = fitness[i]
                if pbest_fitness[i] > engagement_score(gbest, 0.5, 0.1, 0.3, 0.1, likes, shares, comments, time_spent):
                    gbest = pbest[i].copy()
       # print(gbest)

        convergence_curve.append(engagement_score(gbest, 0.5, 0.1, 0.3, 0.1, likes, shares, comments, time_spent))

    return gbest, convergence_curve

# إعداد معايير المشكلة
dimensions = 4
swarm_size = 5
max_iter = 200
w, c1, c2 = 0.7, 1.5, 2.5
runs = 5
#تفاعل المستخدم مع اكثر من محتوى تكون على شكل مصفوفه
likes = np.random.randint(1, 100, 20)
shares = np.random.randint(1, 100, 20)
comments = np.random.randint(1, 100, 20)
time_spent = np.random.randint(1, 100, 20)

# تشغيل الخوارزمية 30 مرة وتخزين أفضل جزيء
best_particle_overall = None
best_score_overall = -np.inf
all_runs_convergence = []
#all_runs_best_score= []


for run in range(runs):
    best_particle, convergence_curve = pso_engagement(dimensions, swarm_size, max_iter, w, c1, c2, likes, shares, comments, time_spent)
    all_runs_convergence.append(convergence_curve)
   # all_runs_best_score.append(best_particle)
    
    # تحديث أفضل جزيء وأفضل درجة
    final_score = convergence_curve[-1]
    if final_score > best_score_overall:
        best_score_overall = final_score
        best_particle_overall = best_particle
print(best_particle_overall)

# تحويل أفضل جزيء إلى أوقات بالساعات
best_times = particle_to_time(best_particle_overall)

# عرض أفضل أوقات توزيع المحتوى
print("Best Schedule (Times):", best_times)
print("Best Engagement Score:", best_score_overall)

# حساب متوسط منحنى التوافق
average_convergence = np.mean(all_runs_convergence, axis=0)
#average_best_times = np.mean(all_runs_best_score, axis=0)

# رسم منحنى التوافق المتوسط
plt.figure(figsize=(10, 6))
plt.title('Average Convergence Curve for 5 Runs')
plt.xlabel('Iteration')
plt.ylabel('Average Best Engagement Score')
plt.plot(range(1, max_iter + 1), average_convergence, label='Average Convergence Curve', color='blue')

#plt.plot(range(1, max_iter + 1), best_particle, label='Average best_particle', color='red')
plt.legend()
plt.grid(True)
plt.show()
